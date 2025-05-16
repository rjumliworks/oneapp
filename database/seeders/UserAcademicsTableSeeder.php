<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAcademicsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_academics')->delete();
        
        \DB::table('user_academics')->insert(array (
            0 => 
            array (
                'id' => 1,
                'school' => 'Ateneo de Zamboanga University',
                'course' => 'Bachelor of Science in Information Technology',
                'is_ongoing' => 0,
                'level_id' => 313,
                'user_id' => 1,
                'graduated_at' => '2017',
                'created_at' => '2025-02-20 12:06:56',
                'updated_at' => '2025-02-20 12:06:56',
            ),
        ));

        
    }
}