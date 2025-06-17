<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_menu')->delete();
        
        \DB::table('role_menu')->insert(array (
            0 => 
            array (
                'id' => 7,
                'role_id' => 3,
                'menu_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 27,
                'role_id' => 2,
                'menu_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 28,
                'role_id' => 2,
                'menu_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 29,
                'role_id' => 2,
                'menu_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 30,
                'role_id' => 2,
                'menu_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 31,
                'role_id' => 2,
                'menu_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 32,
                'role_id' => 2,
                'menu_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 89,
                'role_id' => 2,
                'menu_id' => 49,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 90,
                'role_id' => 2,
                'menu_id' => 50,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}