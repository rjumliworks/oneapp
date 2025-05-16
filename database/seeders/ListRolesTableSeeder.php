<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListRolesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_roles')->delete();
        
        \DB::table('list_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'type' => 'staff',
                'is_active' => 1,
                'definition' => 'n/a',
                'created_at' => '2025-02-11 16:39:48',
                'updated_at' => '2025-02-11 16:39:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Human Resource Officer',
                'type' => 'staff',
                'is_active' => 1,
                'definition' => 'n/a',
                'created_at' => '2025-02-11 16:42:39',
                'updated_at' => '2025-02-11 16:42:39',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Document Control Officer',
                'type' => 'staff',
                'is_active' => 1,
                'definition' => 'n/a',
                'created_at' => '2025-02-11 16:43:06',
                'updated_at' => '2025-02-11 16:43:06',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Vehicle Operations',
                'type' => 'staff',
                'is_active' => 1,
                'definition' => 'n/a',
                'created_at' => '2025-02-11 16:43:32',
                'updated_at' => '2025-02-11 16:43:32',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Regular',
                'type' => 'staff',
                'is_active' => 1,
                'definition' => 'n/a',
                'created_at' => '2025-02-11 16:43:32',
                'updated_at' => '2025-02-11 16:43:32',
            ),
        ));

        
    }
}