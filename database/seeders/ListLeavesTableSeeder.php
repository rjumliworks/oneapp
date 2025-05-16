<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListLeavesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_leaves')->delete();
        
        \DB::table('list_leaves')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Vacation Leave',
                'citation' => 'Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No. 292',
                'is_regular' => 1,
                'is_increasing' => 1,
                'renewal_period' => 'Monthly',
                'max_days' => 0,
                'accrual_rate' => '1.25',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mandatory/Forced Leave',
                'citation' => 'Sec. 25, Rule XVI, Omnibus Rules Implementing E.O. No. 292',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => '',
                'max_days' => 0,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Sick Leave',
                'citation' => 'Sec. 43, Rule XVI, Omnibus Rules Implementing E.O. No. 292',
                'is_regular' => 1,
                'is_increasing' => 1,
                'renewal_period' => 'Monthly',
                'max_days' => 0,
                'accrual_rate' => '1.25',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Maternity Leave',
                'citation' => 'Republic Act No. 11210 / IRR Issued by CSC, DOLE and SSS',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => 'Event',
                'max_days' => 105,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Paternity Leave',
                'citation' => 'Republic Act No. 8187 / CSC MC No. 71, s. 1998, as amended',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => 'Event',
                'max_days' => 7,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Special Privilege Leave',
                'citation' => 'Sec. 21, Rule XVI, Omnibus Rules Implementing E.O. No. 292',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => 'Yearly',
                'max_days' => 3,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Solo Parent Leave',
                'citation' => 'Republic Act No. 8972 / CSC MC No. 8, s. 2004',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => 'Yearly',
                'max_days' => 3,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Study Leave',
                'citation' => 'Sec 68, Rule XVI Omnibus Rules Implementing E.O. No. 292',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => 'Event',
                'max_days' => 183,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '10-Day VAWC Leave',
                'citation' => 'Republic Act No. 9262',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => '',
                'max_days' => 0,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Rehabilitation Privilege',
                'citation' => 'Sec. 55, Rule XVI, Omnibus Rules Implementing E.O. No. 292',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => '',
                'max_days' => 0,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Special Leave Benefits for Women',
                'citation' => 'Republic Act No. 9710',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => 'Event',
                'max_days' => 60,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
            'name' => 'Special Emergency (Calamity) Leave',
                'citation' => 'CSC MC No. 2, s. 2012, as amended',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => '',
                'max_days' => 0,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Adoption Leave',
                'citation' => 'Republic Act No. 8552',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => '',
                'max_days' => 0,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'CTO Leave',
                'citation' => 'Republic Act No. 8552',
                'is_regular' => 0,
                'is_increasing' => 0,
                'renewal_period' => '',
                'max_days' => 0,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => '2025-05-15 15:42:30',
                'updated_at' => '2025-05-15 15:42:30',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Terminal Leave',
                'citation' => 'Republic Act No. 8291',
                'is_regular' => 1,
                'is_increasing' => 0,
                'renewal_period' => '',
                'max_days' => 0,
                'accrual_rate' => '0.00',
                'is_active' => 1,
                'created_at' => '2025-05-15 15:42:30',
                'updated_at' => '2025-05-15 15:42:30',
            ),
        ));

        
    }
}