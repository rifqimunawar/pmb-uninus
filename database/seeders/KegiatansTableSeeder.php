<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KegiatansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kegiatans')->delete();
        
        \DB::table('kegiatans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_kegiatan' => 'Latihan catur update',
                'img' => 'kegiatan_20250602234004.png',
                'desc' => 'turnamen catur 17 an',
                'tgl_kegiatan' => '2025-06-19',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-05-28 14:56:56',
                'updated_at' => '2025-06-02 23:40:04',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_kegiatan' => 'pelaksanaan pmb',
                'img' => 'kegiatan_20250602234034.jpeg',
                'desc' => 'menyambut tahun ajaran baru 2025-2026',
                'tgl_kegiatan' => '2025-06-05',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:40:34',
                'updated_at' => '2025-06-02 23:52:36',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_kegiatan' => 'Vel eos odio saepe n',
                'img' => 'kegiatan_20250602235120.jpg',
                'desc' => 'Tempor velit error n',
                'tgl_kegiatan' => '2025-06-04',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-02 23:51:20',
                'updated_at' => '2025-06-02 23:51:51',
            ),
        ));
        
        
    }
}