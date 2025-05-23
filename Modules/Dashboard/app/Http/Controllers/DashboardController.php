<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Sinkronisasi\Models\Sinkronisasi;

class DashboardController extends Controller
{

  public function index()
  {
    return view('dashboard::index');
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
