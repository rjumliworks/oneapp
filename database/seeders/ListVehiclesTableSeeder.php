<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListVehiclesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_vehicles')->delete();
        
        \DB::table('list_vehicles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hilux G - MT',
                'plate' => '12-29-18',
                'type' => 'Pick-up',
                'status_id' => 21,
                'station_id' => 5,
                'driver_id' => 1,
                'is_available' => 1,
                'created_at' => '2025-07-12 17:04:34',
                'updated_at' => '2025-07-12 17:04:34',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hilux G - AT',
                'plate' => '08-26-21',
                'type' => 'Pick-up',
                'status_id' => 21,
                'station_id' => 5,
                'driver_id' => 1,
                'is_available' => 1,
                'created_at' => '2025-07-12 17:04:34',
                'updated_at' => '2025-07-12 17:04:34',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Starada - GL',
                'plate' => '04-08-08',
                'type' => 'Pick-up',
                'status_id' => 21,
                'station_id' => 5,
                'driver_id' => 1,
                'is_available' => 1,
                'created_at' => '2025-07-12 17:04:34',
                'updated_at' => '2025-07-12 17:04:34',
            ),
        ));

        
    }
}