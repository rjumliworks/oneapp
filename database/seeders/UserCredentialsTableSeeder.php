<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserCredentialsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_credentials')->delete();
        
        \DB::table('user_credentials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_id' => 230,
                'type_id' => 309,
                'user_id' => 1,
                'issued_at' => '2020-03-11',
                'created_at' => '2025-02-20 11:30:34',
                'updated_at' => '2025-02-20 11:30:34',
            ),
        ));

        
    }
}