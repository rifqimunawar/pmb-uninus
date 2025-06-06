<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SinkronisasisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sinkronisasis')->delete();
        
        \DB::table('sinkronisasis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fakultas' => 'FAKULTAS AGAMA ISLAM',
                'prodi' => 'Komunikasi Dan Penyiaran Islam',
                'pelayanan_online' => 12,
                'pelayanan_offline' => 4,
                'pendaftar' => 33,
                'bayar_form_reguler' => 3,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 3,
                'nim' => 6,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:46',
                'updated_at' => '2025-06-02 23:27:46',
            ),
            1 => 
            array (
                'id' => 2,
                'fakultas' => 'FAKULTAS AGAMA ISLAM',
            'prodi' => 'Pendidikan Agama Islam (S1)',
                'pelayanan_online' => 37,
                'pelayanan_offline' => 13,
                'pendaftar' => 115,
                'bayar_form_reguler' => 10,
                'bayar_form_rpl' => 1,
                'bayar_form_karyawan' => 3,
                'bayar_form_kipk' => 22,
                'nim' => 36,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:46',
                'updated_at' => '2025-06-02 23:27:46',
            ),
            2 => 
            array (
                'id' => 3,
                'fakultas' => 'FAKULTAS AGAMA ISLAM',
                'prodi' => 'Pendidikan Guru Madrasah Ibtidaiyah',
                'pelayanan_online' => 13,
                'pelayanan_offline' => 2,
                'pendaftar' => 91,
                'bayar_form_reguler' => 12,
                'bayar_form_rpl' => 1,
                'bayar_form_karyawan' => 1,
                'bayar_form_kipk' => 20,
                'nim' => 34,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:46',
                'updated_at' => '2025-06-02 23:27:46',
            ),
            3 => 
            array (
                'id' => 4,
                'fakultas' => 'FAKULTAS AGAMA ISLAM',
                'prodi' => 'Perbankan Syari`ah',
                'pelayanan_online' => 3,
                'pelayanan_offline' => 3,
                'pendaftar' => 47,
                'bayar_form_reguler' => 2,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 5,
                'nim' => 7,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:46',
                'updated_at' => '2025-06-02 23:27:46',
            ),
            4 => 
            array (
                'id' => 5,
                'fakultas' => 'FAKULTAS EKONOMI',
                'prodi' => 'Akuntansi',
                'pelayanan_online' => 16,
                'pelayanan_offline' => 5,
                'pendaftar' => 88,
                'bayar_form_reguler' => 4,
                'bayar_form_rpl' => 1,
                'bayar_form_karyawan' => 2,
                'bayar_form_kipk' => 31,
                'nim' => 38,
                'bayar_ukt_reguler' => 1,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:46',
                'updated_at' => '2025-06-02 23:27:46',
            ),
            5 => 
            array (
                'id' => 6,
                'fakultas' => 'FAKULTAS EKONOMI',
                'prodi' => 'Manajemen',
                'pelayanan_online' => 50,
                'pelayanan_offline' => 24,
                'pendaftar' => 171,
                'bayar_form_reguler' => 6,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 2,
                'bayar_form_kipk' => 47,
                'nim' => 55,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:46',
                'updated_at' => '2025-06-02 23:27:46',
            ),
            6 => 
            array (
                'id' => 7,
                'fakultas' => 'FAKULTAS HUKUM',
            'prodi' => 'Ilmu Hukum (S1)',
                'pelayanan_online' => 37,
                'pelayanan_offline' => 13,
                'pendaftar' => 102,
                'bayar_form_reguler' => 10,
                'bayar_form_rpl' => 4,
                'bayar_form_karyawan' => 6,
                'bayar_form_kipk' => 18,
                'nim' => 38,
                'bayar_ukt_reguler' => 4,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:46',
                'updated_at' => '2025-06-02 23:27:46',
            ),
            7 => 
            array (
                'id' => 8,
                'fakultas' => 'FAKULTAS ILMU KOMUNIKASI',
                'prodi' => 'Ilmu Komunikasi',
                'pelayanan_online' => 22,
                'pelayanan_offline' => 8,
                'pendaftar' => 134,
                'bayar_form_reguler' => 7,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 41,
                'nim' => 48,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            8 => 
            array (
                'id' => 9,
                'fakultas' => 'FAKULTAS ILMU KOMUNIKASI',
                'prodi' => 'Ilmu Perpustakaan',
                'pelayanan_online' => 9,
                'pelayanan_offline' => 1,
                'pendaftar' => 10,
                'bayar_form_reguler' => 1,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 1,
                'nim' => 2,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            9 => 
            array (
                'id' => 10,
                'fakultas' => 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN',
                'prodi' => 'Pendidikan Bahasa Arab',
                'pelayanan_online' => 17,
                'pelayanan_offline' => 5,
                'pendaftar' => 33,
                'bayar_form_reguler' => 8,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 3,
                'nim' => 11,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            10 => 
            array (
                'id' => 11,
                'fakultas' => 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN',
                'prodi' => 'Pendidikan Bahasa Dan Sastra Indonesia',
                'pelayanan_online' => 10,
                'pelayanan_offline' => 6,
                'pendaftar' => 57,
                'bayar_form_reguler' => 1,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 1,
                'bayar_form_kipk' => 16,
                'nim' => 18,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            11 => 
            array (
                'id' => 12,
                'fakultas' => 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN',
                'prodi' => 'Pendidikan Bahasa Inggris',
                'pelayanan_online' => 12,
                'pelayanan_offline' => 4,
                'pendaftar' => 48,
                'bayar_form_reguler' => 2,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 10,
                'nim' => 12,
                'bayar_ukt_reguler' => 1,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            12 => 
            array (
                'id' => 13,
                'fakultas' => 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN',
                'prodi' => 'Pendidikan Guru Pendidikan Anak Usia Dini',
                'pelayanan_online' => 10,
                'pelayanan_offline' => 5,
                'pendaftar' => 31,
                'bayar_form_reguler' => 0,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 1,
                'bayar_form_kipk' => 7,
                'nim' => 8,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            13 => 
            array (
                'id' => 14,
                'fakultas' => 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN',
                'prodi' => 'Pendidikan Luar Biasa',
                'pelayanan_online' => 38,
                'pelayanan_offline' => 14,
                'pendaftar' => 69,
                'bayar_form_reguler' => 23,
                'bayar_form_rpl' => 4,
                'bayar_form_karyawan' => 7,
                'bayar_form_kipk' => 7,
                'nim' => 41,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            14 => 
            array (
                'id' => 15,
                'fakultas' => 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN',
                'prodi' => 'Pendidikan Masyarakat',
                'pelayanan_online' => 3,
                'pelayanan_offline' => 0,
                'pendaftar' => 19,
                'bayar_form_reguler' => 0,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 7,
                'nim' => 7,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            15 => 
            array (
                'id' => 16,
                'fakultas' => 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN',
                'prodi' => 'Pendidikan Matematika',
                'pelayanan_online' => 6,
                'pelayanan_offline' => 7,
                'pendaftar' => 35,
                'bayar_form_reguler' => 2,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 20,
                'nim' => 22,
                'bayar_ukt_reguler' => 1,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            16 => 
            array (
                'id' => 17,
                'fakultas' => 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN',
                'prodi' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'pelayanan_online' => 2,
                'pelayanan_offline' => 5,
                'pendaftar' => 35,
                'bayar_form_reguler' => 1,
                'bayar_form_rpl' => 1,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 8,
                'nim' => 10,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            17 => 
            array (
                'id' => 18,
                'fakultas' => 'FAKULTAS PERTANIAN',
                'prodi' => 'Agroteknologi',
                'pelayanan_online' => 16,
                'pelayanan_offline' => 3,
                'pendaftar' => 50,
                'bayar_form_reguler' => 3,
                'bayar_form_rpl' => 1,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 16,
                'nim' => 20,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            18 => 
            array (
                'id' => 19,
                'fakultas' => 'PASCASARJANA',
                'prodi' => 'S2 - Administrasi Pendidikan',
                'pelayanan_online' => 35,
                'pelayanan_offline' => 8,
                'pendaftar' => 48,
                'bayar_form_reguler' => 6,
                'bayar_form_rpl' => 12,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 0,
                'nim' => 18,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 1,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            19 => 
            array (
                'id' => 20,
                'fakultas' => 'PASCASARJANA',
                'prodi' => 'S2 - Ilmu Hukum',
                'pelayanan_online' => 18,
                'pelayanan_offline' => 7,
                'pendaftar' => 20,
                'bayar_form_reguler' => 2,
                'bayar_form_rpl' => 5,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 0,
                'nim' => 7,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            20 => 
            array (
                'id' => 21,
                'fakultas' => 'PASCASARJANA',
                'prodi' => 'S2 - Pendidikan Agama Islam',
                'pelayanan_online' => 11,
                'pelayanan_offline' => 4,
                'pendaftar' => 14,
                'bayar_form_reguler' => 5,
                'bayar_form_rpl' => 2,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 0,
                'nim' => 7,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            21 => 
            array (
                'id' => 22,
                'fakultas' => 'PASCASARJANA',
                'prodi' => 'S3 - Ilmu Pendidikan',
                'pelayanan_online' => 15,
                'pelayanan_offline' => 9,
                'pendaftar' => 10,
                'bayar_form_reguler' => 7,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 0,
                'nim' => 7,
                'bayar_ukt_reguler' => 1,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            22 => 
            array (
                'id' => 23,
                'fakultas' => 'PASCASARJANA',
                'prodi' => 'S3 - Pendidikan Agama Islam',
                'pelayanan_online' => 3,
                'pelayanan_offline' => 4,
                'pendaftar' => 13,
                'bayar_form_reguler' => 3,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 0,
                'bayar_form_kipk' => 0,
                'nim' => 3,
                'bayar_ukt_reguler' => 1,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            23 => 
            array (
                'id' => 24,
                'fakultas' => 'FAKULTAS TEKNIK',
                'prodi' => 'Teknik Elektro',
                'pelayanan_online' => 13,
                'pelayanan_offline' => 3,
                'pendaftar' => 28,
                'bayar_form_reguler' => 3,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 2,
                'bayar_form_kipk' => 8,
                'nim' => 13,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            24 => 
            array (
                'id' => 25,
                'fakultas' => 'FAKULTAS TEKNIK',
                'prodi' => 'Teknik Industri',
                'pelayanan_online' => 9,
                'pelayanan_offline' => 4,
                'pendaftar' => 64,
                'bayar_form_reguler' => 3,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 1,
                'bayar_form_kipk' => 20,
                'nim' => 24,
                'bayar_ukt_reguler' => 2,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
            25 => 
            array (
                'id' => 26,
                'fakultas' => 'FAKULTAS TEKNIK',
                'prodi' => 'Teknik Informatika',
                'pelayanan_online' => 18,
                'pelayanan_offline' => 7,
                'pendaftar' => 84,
                'bayar_form_reguler' => 1,
                'bayar_form_rpl' => 0,
                'bayar_form_karyawan' => 1,
                'bayar_form_kipk' => 36,
                'nim' => 38,
                'bayar_ukt_reguler' => 0,
                'bayar_ukt_rpl' => 0,
                'bayar_ukt_karyawan' => 0,
                'created_by' => 'unknown',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:27:47',
                'updated_at' => '2025-06-02 23:27:47',
            ),
        ));
        
        
    }
}