<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListStatusesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_statuses')->delete();
        
        \DB::table('list_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Not Available',
                'classification' => 'n/a',
                'type' => 'bg-dark',
                'color' => 'text-white',
                'others' => 'bg-dark',
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Active',
                'classification' => 'Status',
                'type' => 'bg-success',
                'color' => 'text-white',
                'others' => 'Currently employed and working',
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Retired',
                'classification' => 'Status',
                'type' => 'bg-info',
                'color' => 'text-white',
                'others' => 'No longer working due to age or years of service',
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Resigned',
                'classification' => 'Status',
                'type' => 'bg-warning',
                'color' => 'text-white',
                'others' => 'Voluntarily left the job',
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Terminated',
                'classification' => 'Status',
                'type' => 'bg-danger',
                'color' => 'text-white',
                'others' => 'Dismissed from employment',
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Dismiseed',
                'classification' => 'Status',
                'type' => 'bg-danger',
                'color' => 'text-white',
                'others' => 'Fired for a specific reason',
                'is_active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'End of Contract',
                'classification' => 'Status',
                'type' => 'bg-dark',
                'color' => 'text-white',
                'others' => 'Completed contract and not renewed',
                'is_active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Deceased',
                'classification' => 'Status',
                'type' => 'bg-dark',
                'color' => 'text-white',
                'others' => 'Passed away while employed',
                'is_active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Absconded',
                'classification' => 'Status',
                'type' => 'bg-warning',
                'color' => 'text-white',
                'others' => 'Left the job without notice',
                'is_active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Active',
                'classification' => 'Contract',
                'type' => 'bg-success',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Promoted',
                'classification' => 'Contract',
                'type' => 'bg-primary',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Salary Increased',
                'classification' => 'Contract',
                'type' => 'bg-info',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Terminated',
                'classification' => 'Contract',
                'type' => 'bg-danger',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Resigned',
                'classification' => 'Contract',
                'type' => 'bg-warning',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Absorbed',
                'classification' => 'Contract',
                'type' => 'bg-dark',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Ended',
                'classification' => 'Contract',
                'type' => 'bg-danger',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Draft',
                'classification' => 'Payroll',
                'type' => 'bg-info',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Pending',
                'classification' => 'Payroll',
                'type' => 'bg-warning',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Completed',
                'classification' => 'Payroll',
                'type' => 'bg-success',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Cancelled',
                'classification' => 'Payroll',
                'type' => 'bg-danger',
                'color' => 'text-white',
                'others' => 'n/a',
                'is_active' => 1,
            ),
        ));

        
    }
}