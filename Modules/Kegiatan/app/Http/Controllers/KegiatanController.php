<?php

namespace Modules\Kegiatan\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Kegiatan\Models\Kegiatan;
use RealRashid\SweetAlert\Facades\Alert;

class KegiatanController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/kegiatan');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Kegiatan';
    $data = Kegiatan::latest()->get();

    return view(
      'kegiatan::/kegiatan/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/kegiatan');

    $title = "Tambah Kegiatan";
    return view(
      'kegiatan::kegiatan/create',
      [
        'title' => $title,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    $request->validate([
      'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'kegiatan_' . now()->format('YmdHis') . '.' . $extension;
      $request->file('img')->move(public_path('img'), $newFileName);
      $data['img'] = $newFileName;
    }

    // Cek apakah ini update atau create
    if (!empty($request->id)) {
      $kegiatan = Kegiatan::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $kegiatan->update($data);
    } else {
      $data['created_by'] = Auth::user()->username;
      Kegiatan::create($data);
    }

    Alert::success('Success', 'Data berhasil ' . (!empty($request->id) ? 'diupdate' : 'disimpan'));
    return redirect()->route('kegiatan.index');
  }

  public function edit($id)
  {
    $title = "Update Data Kegiatan";
    Fungsi::hakAkses('/kegiatan');
    $data = Kegiatan::findOrFail($id);

    return view(
      'kegiatan::kegiatan.edit',
      [
        'data' => $data,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/kegiatan');

    $data = Kegiatan::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    $data->save();

    // Jika data tidak boleh dihapus ketika ada relasi database lain uhuy
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data umum');
    //   return redirect()->route('umum.index');
    // }

    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('kegiatan.index');
  }

}
