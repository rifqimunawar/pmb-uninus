<?php

namespace Modules\ReportUmum\Http\Controllers;

use SheetDB\SheetDB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Modules\ReportUmum\Models\ReportUmum;

class ReportUmumController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  // public function index()
  // {
  //   $url = config('app.GET_REPORT_UMUM');
  //   $response = Http::get($url);

  //   if ($response->successful()) {
  //     $data = $response->json();

  //     // Debug jika $data null atau bukan array
  //     if (!is_array($data)) {
  //       return response($response);
  //     }

  //     ReportUmum::truncate();

  //     foreach ($data as $item) {
  //       ReportUmum::create([
  //         'fakultas' => $item['fakultas'] ?? '-',
  //         'prodi' => $item['prodi'] ?? '-',
  //         'pelayanan_online' => $item['pelayanan_online'] ?? 0,
  //         'pelayanan_offline' => $item['pelayanan_offline'] ?? 0,
  //         'pendaftar' => $item['pendaftar'] ?? 0,
  //         'bayar_form_reguler' => $item['bayar_form_reguler'] ?? 0,
  //         'bayar_form_rpl' => $item['bayar_form_rpl'] ?? 0,
  //         'bayar_form_karyawan' => $item['bayar_form_karyawan'] ?? 0,
  //         'bayar_form_kipk' => $item['bayar_form_kipk'] ?? 0,
  //         'nim' => $item['nim'] ?? 0,
  //         'bayar_ukt_reguler' => $item['bayar_ukt_reguler'] ?? 0,
  //         'bayar_ukt_rpl' => $item['bayar_ukt_rpl'] ?? 0,
  //         'bayar_ukt_karyawan' => $item['bayar_ukt_karyawan'] ?? 0,
  //         'created_by' => 'system',
  //         'updated_by' => 'system',
  //       ]);
  //     }

  //     return response()->json(['message' => 'Data berhasil disimpan.'], 200);
  //   }

  //   return response()->json(['message' => 'Gagal mengambil data dari sumber eksternal.'], 500);
  // }

  // public function get_data_sheet()
  // {
  //   $user = Auth::user();

  //   $accessToken = $user->google_token;

  //   $spreadsheetId = '1qnHsMUq4Q1IUcY0FVONOMoWAQ_qtzMQqAKzwUXy4IqA';
  //   $range = 'REPORT UMUM!B6:M39';

  //   $url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheetId}/values/{$range}";

  //   $response = Http::withToken($accessToken)->get($url);

  //   if ($response->failed()) {
  //     return response()->json(['error' => 'Gagal mengambil data. Token mungkin sudah kedaluwarsa.'], 401);
  //   }

  //   return $response->json();
  // }

  public function get_data()
  {
    $endpoint = 'https://sheetdb.io/api/v1';
    $apiKey = 'vatxd58pqd6fz';
    $sheet = 'sheet=sheet1';

    $startRow = 6;
    $endRow = 39;
    $startCol = 'B';
    $endCol = 'M';

    $cells = [];
    for ($row = $startRow; $row <= $endRow; $row++) {
      for ($col = ord($startCol); $col <= ord($endCol); $col++) {
        $cells[] = chr($col) . $row;
      }
    }

    $cellsString = implode(',', $cells);

    $cells = 'B4,B5,B6,C4,C5,C6,D4,D5,D6';

    $sheetdbUrl = $endpoint . '/' . $apiKey . '/' . $sheet . '&range=' . $cells;
    $response = Http::get($sheetdbUrl);
    $data = $response->json();

    $startRow = 5;  // Index PHP mulai dari 0 → baris ke-6 = index 5
    $lastRow = 38;  // baris ke-39 = index 38

    $filteredRows = array_slice($data, $startRow, $lastRow - $startRow + 1);

    $currentFakultas = '';
    $jsonData = [];

    foreach ($filteredRows as $row) {
      // Pastikan kolom sesuai header Google Sheet kamu
      $cellValue = $row['nama'] ?? null; // kolom B → ubah 'nama' sesuai nama header di Sheet

      if (empty($cellValue)) {
        continue; // skip baris kosong
      }

      if (mb_strtoupper($cellValue) === $cellValue) {
        // baris fakultas (huruf kapital semua)
        $currentFakultas = $cellValue;
      } else {
        // baris prodi
        $jsonData[] = [
          'fakultas' => $currentFakultas,
          'prodi' => $cellValue,
          'pelayanan_online' => $row['pelayanan_online'] ?? null,
          'pelayanan_offline' => $row['pelayanan_offline'] ?? null,
          'pendaftar' => $row['pendaftar'] ?? null,
          'bayar_form_reguler' => $row['bayar_form_reguler'] ?? null,
          'bayar_form_rpl' => $row['bayar_form_rpl'] ?? null,
          'bayar_form_karyawan' => $row['bayar_form_karyawan'] ?? null,
          'bayar_form_kipk' => $row['bayar_form_kipk'] ?? null,
          'nim' => $row['nim'] ?? null,
          'bayar_ukt_reguler' => $row['bayar_ukt_reguler'] ?? null,
          'bayar_ukt_rpl' => $row['bayar_ukt_rpl'] ?? null,
          'bayar_ukt_karyawan' => $row['bayar_ukt_karyawan'] ?? null,
        ];
      }
    }

    return response()->json($jsonData);
  }

}
