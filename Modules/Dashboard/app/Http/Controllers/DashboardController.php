<?php

namespace Modules\Dashboard\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Modules\Sinkronisasi\Models\Sinkronisasi;

class DashboardController extends Controller
{

  public function index()
  {
    $data = Sinkronisasi::latest()->get();
    $totalPendaftar = $data->sum('pendaftar');  // jumlahkan field pendaftar dari seluruh data

    $totalBayarFormulir = $data->sum('bayar_form_reguler')
        + $data->sum('bayar_form_rpl')
        + $data->sum('bayar_form_karyawan')
        + $data->sum('bayar_form_kipk');

    $totalBayarUKT = $data->sum('bayar_ukt_reguler')
        + $data->sum('bayar_ukt_rpl')
        + $data->sum('bayar_ukt_karyawan');

    return view('dashboard::index', compact('data', 'totalPendaftar', 'totalBayarFormulir', 'totalBayarUKT'));
  }

  public function get_data_all()
  {
    $data = Sinkronisasi::all();
    return response()->json($data);
  }
  public function get_data_jenjang($nama_jenjang)
  {
    if (strtoupper($nama_jenjang) === 'PASCASARJANA') {
      $data = Sinkronisasi::where('fakultas', 'PASCASARJANA')->get();
    } elseif (strtoupper($nama_jenjang) === 'SARJANA') {
      $data = Sinkronisasi::where('fakultas', '!=', 'PASCASARJANA')->get();
    } else {
      $data = Sinkronisasi::all();
    }
    return response()->json($data);
  }

  public function get_data_fakultas($nama_fakultas)
  {
    $data = Sinkronisasi::where('fakultas', '!=', 'PASCASARJANA')
      ->where('fakultas', 'like', '%' . $nama_fakultas . '%')
      ->get();
    return response()->json($data);
  }


  public function get_data_prodi($nama_prodi)
  {
    $data = Sinkronisasi::where('prodi', 'like', '%' . $nama_prodi . '%')->get();
    return response()->json($data);
  }

  public function get_data_bayar_formulir(Request $request)
{
    $validated = $request->validate([
        'jenjang' => 'nullable|string',
        'fakultas' => 'nullable|string',
        'prodi' => 'nullable|string',
    ]);

    $query = Sinkronisasi::query();

    // Filter berdasarkan jenjang pakai kolom fakultas, seperti di method get_data_jenjang
    if (!empty($validated['jenjang'])) {
        if (strtoupper($validated['jenjang']) === 'PASCASARJANA') {
            $query->where('fakultas', 'PASCASARJANA');
        } elseif (strtoupper($validated['jenjang']) === 'SARJANA') {
            $query->where('fakultas', '!=', 'PASCASARJANA');
        }
        // Bisa tambah kondisi lain jika ada jenjang lain
    }

    if (!empty($validated['fakultas'])) {
        $query->where('fakultas', $validated['fakultas']);
    }

    if (!empty($validated['prodi'])) {
        $query->where('prodi', $validated['prodi']);
    }

    $data = $query->selectRaw('
        SUM(bayar_form_reguler) as reguler,
        SUM(bayar_form_rpl) as rpl,
        SUM(bayar_form_karyawan) as karyawan,
        SUM(bayar_form_kipk) as kipk
    ')->first();

    $result = [
        'reguler' => (int) ($data->reguler ?? 0),
        'rpl' => (int) ($data->rpl ?? 0),
        'karyawan' => (int) ($data->karyawan ?? 0),
        'kipk' => (int) ($data->kipk ?? 0),
        'total' => (int) (
            ($data->reguler ?? 0) +
            ($data->rpl ?? 0) +
            ($data->karyawan ?? 0) +
            ($data->kipk ?? 0)
        ),
    ];

    return response()->json($result);
}

}
