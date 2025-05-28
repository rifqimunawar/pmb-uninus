<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LimitApisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('limit_apis')->delete();
        
        \DB::table('limit_apis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'month' => 5,
                'year' => 2025,
                'usage_count' => 43,
                'limit' => 500,
                'deleted_at' => NULL,
                'created_at' => '2025-05-23 12:04:22',
                'updated_at' => '2025-05-23 16:07:28',
            ),
        ));
        
        
    }
}