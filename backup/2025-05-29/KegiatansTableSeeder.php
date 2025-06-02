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
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-05-28 14:56:56',
                'updated_at' => '2025-05-28 14:59:28',
            ),
        ));
        
        
    }
}