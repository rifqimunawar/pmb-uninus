<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Ronda\Models\Ronda;
use Modules\Master\Models\Warga;
use App\Http\Controllers\Controller;
use Modules\Master\Models\Parameter;
use Modules\Tagihan\Models\TagihanRonda;
use Modules\Pembayaran\Models\Pembayaran;
use Modules\Sinkronisasi\Models\Sinkronisasi;

class DashboardController extends Controller
{

  public function index()
  {
    $fakultas = Sinkronisasi::select('fakultas')
      ->where('fakultas', '!=', 'PASCASARJANA')
      ->distinct()
      ->latest()
      ->pluck('fakultas');
    return view('dashboard::index', ['data', $fakultas]);
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



}
