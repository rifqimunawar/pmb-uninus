<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'SIMABA CENTER',
                'alamat' => 'Jl. Soekarno-Hatta No.530, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286',
                'email' => 'simaba@gmail.com',
                'phone' => '085161145097',
                'base_url' => 'https://dev-pmb.uninus.org/',
                'logo' => 'logo_-1746439630.png',
                'favicon' => NULL,
                'description' => NULL,
                'social_facebook' => NULL,
                'social_twitter' => NULL,
                'social_instagram' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-06-03 00:07:20',
            ),
        ));
        
        
    }
}