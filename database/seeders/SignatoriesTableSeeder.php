<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SignatoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('signatories')->delete();
        
        \DB::table('signatories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'start' => '2025-08-07',
                'end' => '2025-08-07',
                'designation_id' => 43,
                'division_id' => 2,
                'user_id' => 3,
                'is_oic' => 1,
                'is_active' => 1,
                'created_at' => '2025-08-07 15:46:32',
                'updated_at' => '2025-08-07 15:46:32',
            ),
            1 => 
            array (
                'id' => 2,
                'start' => '2025-08-07',
                'end' => '2025-08-07',
                'designation_id' => 44,
                'division_id' => 3,
                'user_id' => 2,
                'is_oic' => 1,
                'is_active' => 1,
                'created_at' => '2025-08-07 15:46:32',
                'updated_at' => '2025-08-07 15:46:32',
            ),
            2 => 
            array (
                'id' => 3,
                'start' => '2025-08-07',
                'end' => '2025-08-07',
                'designation_id' => 44,
                'division_id' => 4,
                'user_id' => 6,
                'is_oic' => 0,
                'is_active' => 1,
                'created_at' => '2025-08-07 15:46:32',
                'updated_at' => '2025-08-07 15:46:32',
            ),
        ));

        
    }
}