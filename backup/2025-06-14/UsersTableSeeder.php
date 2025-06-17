<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'google_id' => NULL,
                'google_token' => NULL,
                'google_refresh_token' => NULL,
                'username' => 'admin',
                'img' => 'profile_admin_1747751631.png',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$03MdGVNvxcw9WlnK2HE84u.lpIXNoa6NYnq4PLdlz34brz8V2.uae',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-05-20 21:33:51',
            ),
        ));
        
        
    }
}