<?php

namespace Modules\Dashboard\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Modules\Kegiatan\Models\Kegiatan;
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

    $waktu_shalat = $this->waktuShalatSekarang();

    $data_kegiatan = Kegiatan::latest()->get();

    return view('dashboard::index', [
      'data' => $data,
      'totalPendaftar' => $totalPendaftar,
      'totalBayarFormulir' => $totalBayarFormulir,
      'totalBayarUKT' => $totalBayarUKT,
      'waktu_shalat' => $waktu_shalat,
      'data_kegiatan' => $data_kegiatan,
    ]);
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

  public function waktuShalatSekarang()
  {
    $api_waktu_shalat = env('API_JADWAL_WAKTU_SHALAT');
    $response = Http::get($api_waktu_shalat . Carbon::now()->format('Y/m/d'));
    $data = $response->json();
    $jadwal = $data['data']['jadwal'];
    $now = Carbon::now();
    $subuh = Carbon::createFromFormat('H:i', $jadwal['subuh']);
    $dzuhur = Carbon::createFromFormat('H:i', $jadwal['dzuhur']);
    $ashar = Carbon::createFromFormat('H:i', $jadwal['ashar']);
    $maghrib = Carbon::createFromFormat('H:i', $jadwal['maghrib']);
    $isya = Carbon::createFromFormat('H:i', $jadwal['isya']);
    foreach ([$subuh, $dzuhur, $ashar, $maghrib, $isya] as $waktu) {
      $waktu->setDate($now->year, $now->month, $now->day);
    }
    $waktuSaatIni = null;
    if ($now->between($subuh, $dzuhur)) {
      $waktuSaatIni = 'Subuh';
    } elseif ($now->between($dzuhur, $ashar)) {
      $waktuSaatIni = 'Dzuhur';
    } elseif ($now->between($ashar, $maghrib)) {
      $waktuSaatIni = 'Ashar';
    } elseif ($now->between($maghrib, $isya)) {
      $waktuSaatIni = 'Maghrib';
    } elseif ($now->greaterThanOrEqualTo($isya)) {
      $waktuSaatIni = 'Isya';
    } elseif ($now->lessThan($subuh)) {
      $waktuSaatIni = 'Menjelang Subuh';
    }
    return $waktuSaatIni;
  }
}
