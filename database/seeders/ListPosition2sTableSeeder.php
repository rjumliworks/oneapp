<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListPosition2sTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_position2s')->truncate();
        
        \DB::table('list_position2s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Not Available',
                'short' => 'n/a',
                'salary_id' => 1,
                'is_regular' => 0,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Chief Administrative Officer',
                'short' => 'Chief AO',
                'salary_id' => 23,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Chief Science Research Specialist',
                'short' => 'Chief SRS',
                'salary_id' => 23,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Supervising Science Research Specialist',
                'short' => 'Supervising SRS',
                'salary_id' => 21,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Senior Science Research Specialist',
                'short' => 'Senior SRS',
                'salary_id' => 18,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Accountant III',
                'short' => 'A III',
                'salary_id' => 18,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Administrative Officer V',
                'short' => 'AO V',
                'salary_id' => 17,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Science Research Specialist II',
                'short' => 'SRS II',
                'salary_id' => 15,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Science Research Specialist I',
                'short' => 'SRS I',
                'salary_id' => 12,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Science Research Assistant',
                'short' => 'SR Assistant',
                'salary_id' => 8,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Administrative Aide IV',
                'short' => 'Admin Aide IV',
                'salary_id' => 2,
                'is_regular' => 1,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Project Technical Specialist IV',
                'short' => 'PTS IV',
                'salary_id' => 19,
                'is_regular' => 0,
                'created_at' => '2025-06-19 20:21:52',
                'updated_at' => '2025-06-19 20:21:52',
            ),
        ));

        
    }
}