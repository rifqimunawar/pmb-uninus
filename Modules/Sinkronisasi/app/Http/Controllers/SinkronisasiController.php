<?php

namespace Modules\Sinkronisasi\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Sinkronisasi\Models\LimitApi;
use Modules\Sinkronisasi\Models\Sinkronisasi;

class SinkronisasiController extends Controller
{

  public function index()
  {
    Fungsi::hakAkses('/sinkronisasi');

    $title = 'Sinkron Database';
    $data = LimitApi::with('users')->first();

    // dd($data);
    return view(
      'sinkronisasi::/sinkronisasi/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/sinkronisasi');

    $title = "Periode Baru";
    return view(
      'master::periode/create',
      [
        'title' => $title,
      ]
    );
  }

  public function get_data()
  {
    // menghitung limit api
    $userLogin = Auth::user();
    $now = Carbon::now();
    $month = $now->month;
    $year = $now->year;
    $limitApi = LimitApi::firstOrCreate(
      [
        'month' => $month,
        'year' => $year,
        'user_id' => $userLogin->id,
      ],
      [
        'usage_count' => 0,
        'limit' => 500
      ]
    );
    if ($limitApi->usage_count >= $limitApi->limit) {
      return response()->json(['message' => 'API limit reached for this month.'], 429);
    }
    $limitApi->increment('usage_count');
    // menghitung limit api end

    $apiKey = env('API_KEY_SPREEDSHEET');
    $baseUrl = 'https://sheetdb.io/api/v1/' . $apiKey;
    $cells = 'B6,C6,D6,E6,F6,G6,H6,I6,J6,K6,L6,M6,B7,C7,D7,E7,F7,G7,H7,I7,J7,K7,L7,M7,B8,C8,D8,E8,F8,G8,H8,I8,J8,K8,L8,M8,B9,C9,D9,E9,F9,G9,H9,I9,J9,K9,L9,M9,B10,C10,D10,E10,F10,G10,H10,I10,J10,K10,L10,M10,B11,C11,D11,E11,F11,G11,H11,I11,J11,K11,L11,M11,B12,C12,D12,E12,F12,G12,H12,I12,J12,K12,L12,M12,B13,C13,D13,E13,F13,G13,H13,I13,J13,K13,L13,M13,B14,C14,D14,E14,F14,G14,H14,I14,J14,K14,L14,M14,B15,C15,D15,E15,F15,G15,H15,I15,J15,K15,L15,M15,B16,C16,D16,E16,F16,G16,H16,I16,J16,K16,L16,M16,B17,C17,D17,E17,F17,G17,H17,I17,J17,K17,L17,M17,B18,C18,D18,E18,F18,G18,H18,I18,J18,K18,L18,M18,B19,C19,D19,E19,F19,G19,H19,I19,J19,K19,L19,M19,B20,C20,D20,E20,F20,G20,H20,I20,J20,K20,L20,M20,B21,C21,D21,E21,F21,G21,H21,I21,J21,K21,L21,M21,B22,C22,D22,E22,F22,G22,H22,I22,J22,K22,L22,M22,B23,C23,D23,E23,F23,G23,H23,I23,J23,K23,L23,M23,B24,C24,D24,E24,F24,G24,H24,I24,J24,K24,L24,M24,B25,C25,D25,E25,F25,G25,H25,I25,J25,K25,L25,M25,B26,C26,D26,E26,F26,G26,H26,I26,J26,K26,L26,M26,B27,C27,D27,E27,F27,G27,H27,I27,J27,K27,L27,M27,B28,C28,D28,E28,F28,G28,H28,I28,J28,K28,L28,M28,B29,C29,D29,E29,F29,G29,H29,I29,J29,K29,L29,M29,B30,C30,D30,E30,F30,G30,H30,I30,J30,K30,L30,M30,B31,C31,D31,E31,F31,G31,H31,I31,J31,K31,L31,M31,B32,C32,D32,E32,F32,G32,H32,I32,J32,K32,L32,M32,B33,C33,D33,E33,F33,G33,H33,I33,J33,K33,L33,M33,B34,C34,D34,E34,F34,G34,H34,I34,J34,K34,L34,M34,B35,C35,D35,E35,F35,G35,H35,I35,J35,K35,L35,M35,B36,C36,D36,E36,F36,G36,H36,I36,J36,K36,L36,M36,B37,C37,D37,E37,F37,G37,H37,I37,J37,K37,L37,M37,B38,C38,D38,E38,F38,G38,H38,I38,J38,K38,L38,M38,B39,C39,D39,E39,F39,G39,H39,I39,J39,K39,L39,M39?';
    $sheetName = 'sheet=REPORT%20UMUM';
    $sheetdbUrl = $baseUrl . 'cells/' . $cells . $sheetName;
    // $response = Http::get($sheetdbUrl);
    // $data = $response->json();
    $jsonData = [];
    $currentFakultas = null;
    $startRow = 6;
    $endRow = 39;

    $jsonData = [];
    $currentFakultas = null;
    Sinkronisasi::truncate();

    for ($row = $startRow; $row <= $endRow; $row++) {
      $cellB = $data['B' . $row] ?? null;
      if (!$cellB)
        continue;

      if (mb_strtoupper($cellB) === $cellB) {
        $currentFakultas = $cellB;
      } else {
        $record = [
          'fakultas' => $currentFakultas,
          'prodi' => $cellB,
          'pelayanan_online' => $data['C' . $row] ?? null,
          'pelayanan_offline' => $data['D' . $row] ?? null,
          'pendaftar' => $data['E' . $row] ?? null,
          'bayar_form_reguler' => $data['F' . $row] ?? null,
          'bayar_form_rpl' => $data['G' . $row] ?? null,
          'bayar_form_karyawan' => $data['H' . $row] ?? null,
          'bayar_form_kipk' => $data['I' . $row] ?? null,
          'nim' => $data['J' . $row] ?? null,
          'bayar_ukt_reguler' => $data['K' . $row] ?? null,
          'bayar_ukt_rpl' => $data['L' . $row] ?? null,
          'bayar_ukt_karyawan' => $data['M' . $row] ?? null,
        ];
        Sinkronisasi::create($record);
        $jsonData[] = $record;
      }
    }

    Alert::success('Success', 'Data berhasil disinkronkan');
    return redirect()->route('dashboard');
  }
}
