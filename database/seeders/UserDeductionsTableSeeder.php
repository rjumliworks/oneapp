<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserDeductionsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_deductions')->delete();
        
        \DB::table('user_deductions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amount' => '1409.75',
                'deduction_id' => 1,
                'user_id' => 30,
                'is_active' => 1,
                'created_at' => '2025-06-23 10:24:44',
                'updated_at' => '2025-06-23 10:24:44',
            ),
            1 => 
            array (
                'id' => 2,
                'amount' => '1000.00',
                'deduction_id' => 2,
                'user_id' => 30,
                'is_active' => 1,
                'created_at' => '2025-06-23 10:25:01',
                'updated_at' => '2025-06-23 10:25:01',
            ),
            2 => 
            array (
                'id' => 3,
                'amount' => '10000.00',
                'deduction_id' => 3,
                'user_id' => 30,
                'is_active' => 1,
                'created_at' => '2025-06-23 10:25:07',
                'updated_at' => '2025-06-23 10:25:07',
            ),
            3 => 
            array (
                'id' => 4,
                'amount' => '3953.71',
                'deduction_id' => 6,
                'user_id' => 30,
                'is_active' => 1,
                'created_at' => '2025-06-23 10:25:32',
                'updated_at' => '2025-06-23 10:25:32',
            ),
            4 => 
            array (
                'id' => 5,
                'amount' => '5075.10',
                'deduction_id' => 7,
                'user_id' => 30,
                'is_active' => 1,
                'created_at' => '2025-06-23 10:25:47',
                'updated_at' => '2025-06-23 10:25:47',
            ),
            5 => 
            array (
                'id' => 6,
                'amount' => '10378.88',
                'deduction_id' => 10,
                'user_id' => 30,
                'is_active' => 1,
                'created_at' => '2025-06-23 10:26:43',
                'updated_at' => '2025-06-23 10:26:43',
            ),
            6 => 
            array (
                'id' => 7,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 30,
                'is_active' => 1,
                'created_at' => '2025-06-23 10:26:57',
                'updated_at' => '2025-06-23 10:26:57',
            ),
            7 => 
            array (
                'id' => 8,
                'amount' => '4641.33',
                'deduction_id' => 14,
                'user_id' => 30,
                'is_active' => 1,
                'created_at' => '2025-06-23 10:27:15',
                'updated_at' => '2025-06-23 10:27:15',
            ),
            8 => 
            array (
                'id' => 9,
                'amount' => '1089.00',
                'deduction_id' => 1,
                'user_id' => 57,
                'is_active' => 1,
                'created_at' => '2025-06-23 15:57:48',
                'updated_at' => '2025-06-23 15:57:48',
            ),
            9 => 
            array (
                'id' => 10,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 57,
                'is_active' => 1,
                'created_at' => '2025-06-23 15:58:03',
                'updated_at' => '2025-06-23 15:58:03',
            ),
            10 => 
            array (
                'id' => 11,
                'amount' => '3920.40',
                'deduction_id' => 7,
                'user_id' => 57,
                'is_active' => 1,
                'created_at' => '2025-06-23 15:58:29',
                'updated_at' => '2025-06-23 15:58:29',
            ),
            11 => 
            array (
                'id' => 12,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 57,
                'is_active' => 1,
                'created_at' => '2025-06-23 15:58:44',
                'updated_at' => '2025-06-23 15:58:44',
            ),
            12 => 
            array (
                'id' => 13,
                'amount' => '4619.34',
                'deduction_id' => 14,
                'user_id' => 57,
                'is_active' => 1,
                'created_at' => '2025-06-23 15:59:00',
                'updated_at' => '2025-06-23 15:59:00',
            ),
            13 => 
            array (
                'id' => 14,
                'amount' => '3000.00',
                'deduction_id' => 12,
                'user_id' => 57,
                'is_active' => 1,
                'created_at' => '2025-06-23 16:01:04',
                'updated_at' => '2025-06-23 16:01:04',
            ),
            14 => 
            array (
                'id' => 15,
                'amount' => '2454.62',
                'deduction_id' => 1,
                'user_id' => 24,
                'is_active' => 1,
                'created_at' => '2025-06-23 16:03:19',
                'updated_at' => '2025-06-23 16:03:19',
            ),
            15 => 
            array (
                'id' => 16,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 24,
                'is_active' => 1,
                'created_at' => '2025-06-23 16:03:28',
                'updated_at' => '2025-06-23 16:03:28',
            ),
            16 => 
            array (
                'id' => 17,
                'amount' => '4890.79',
                'deduction_id' => 4,
                'user_id' => 24,
                'is_active' => 1,
                'created_at' => '2025-06-23 16:04:01',
                'updated_at' => '2025-06-23 16:04:01',
            ),
            17 => 
            array (
                'id' => 18,
                'amount' => '8836.65',
                'deduction_id' => 7,
                'user_id' => 24,
                'is_active' => 1,
                'created_at' => '2025-06-23 16:04:26',
                'updated_at' => '2025-06-23 16:04:26',
            ),
            18 => 
            array (
                'id' => 19,
                'amount' => '7974.59',
                'deduction_id' => 10,
                'user_id' => 24,
                'is_active' => 1,
                'created_at' => '2025-06-23 16:05:31',
                'updated_at' => '2025-06-23 16:05:31',
            ),
            19 => 
            array (
                'id' => 20,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 24,
                'is_active' => 1,
                'created_at' => '2025-06-23 16:05:44',
                'updated_at' => '2025-06-23 16:05:44',
            ),
            20 => 
            array (
                'id' => 21,
                'amount' => '1500.00',
                'deduction_id' => 13,
                'user_id' => 24,
                'is_active' => 1,
                'created_at' => '2025-06-23 16:06:01',
                'updated_at' => '2025-06-23 16:06:01',
            ),
            21 => 
            array (
                'id' => 22,
                'amount' => '19875.59',
                'deduction_id' => 14,
                'user_id' => 24,
                'is_active' => 1,
                'created_at' => '2025-06-23 16:06:14',
                'updated_at' => '2025-06-23 16:06:14',
            ),
            22 => 
            array (
                'id' => 23,
                'amount' => '860.52',
                'deduction_id' => 1,
                'user_id' => 62,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:19:17',
                'updated_at' => '2025-06-24 16:19:17',
            ),
            23 => 
            array (
                'id' => 24,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 62,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:19:37',
                'updated_at' => '2025-06-24 16:19:37',
            ),
            24 => 
            array (
                'id' => 25,
                'amount' => '3097.89',
                'deduction_id' => 7,
                'user_id' => 62,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:20:14',
                'updated_at' => '2025-06-24 16:20:14',
            ),
            25 => 
            array (
                'id' => 26,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 62,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:20:34',
                'updated_at' => '2025-06-24 16:20:34',
            ),
            26 => 
            array (
                'id' => 27,
                'amount' => '1050.00',
                'deduction_id' => 12,
                'user_id' => 62,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:20:47',
                'updated_at' => '2025-06-24 16:20:47',
            ),
            27 => 
            array (
                'id' => 28,
                'amount' => '4196.52',
                'deduction_id' => 14,
                'user_id' => 62,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:21:16',
                'updated_at' => '2025-06-24 16:21:16',
            ),
            28 => 
            array (
                'id' => 29,
                'amount' => '1409.75',
                'deduction_id' => 1,
                'user_id' => 23,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:27:03',
                'updated_at' => '2025-06-24 16:27:03',
            ),
            29 => 
            array (
                'id' => 30,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 23,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:27:14',
                'updated_at' => '2025-06-24 16:27:14',
            ),
            30 => 
            array (
                'id' => 31,
                'amount' => '5075.10',
                'deduction_id' => 7,
                'user_id' => 23,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:27:36',
                'updated_at' => '2025-06-24 16:27:36',
            ),
            31 => 
            array (
                'id' => 32,
                'amount' => '2720.71',
                'deduction_id' => 10,
                'user_id' => 23,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:27:56',
                'updated_at' => '2025-06-24 16:27:56',
            ),
            32 => 
            array (
                'id' => 33,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 23,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:28:09',
                'updated_at' => '2025-06-24 16:28:09',
            ),
            33 => 
            array (
                'id' => 34,
                'amount' => '1500.00',
                'deduction_id' => 13,
                'user_id' => 23,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:28:29',
                'updated_at' => '2025-06-24 16:28:29',
            ),
            34 => 
            array (
                'id' => 35,
                'amount' => '5730.22',
                'deduction_id' => 14,
                'user_id' => 23,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:28:49',
                'updated_at' => '2025-06-24 16:28:49',
            ),
            35 => 
            array (
                'id' => 36,
                'amount' => '2400.00',
                'deduction_id' => 12,
                'user_id' => 23,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:30:08',
                'updated_at' => '2025-06-24 16:30:08',
            ),
            36 => 
            array (
                'id' => 37,
                'amount' => '2454.62',
                'deduction_id' => 1,
                'user_id' => 6,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:34:12',
                'updated_at' => '2025-06-24 16:34:12',
            ),
            37 => 
            array (
                'id' => 38,
                'amount' => '3000.00',
                'deduction_id' => 2,
                'user_id' => 6,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:34:26',
                'updated_at' => '2025-06-24 16:34:26',
            ),
            38 => 
            array (
                'id' => 39,
                'amount' => '5463.18',
                'deduction_id' => 5,
                'user_id' => 6,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:34:50',
                'updated_at' => '2025-06-24 16:34:50',
            ),
            39 => 
            array (
                'id' => 40,
                'amount' => '8836.65',
                'deduction_id' => 7,
                'user_id' => 6,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:35:09',
                'updated_at' => '2025-06-24 16:35:09',
            ),
            40 => 
            array (
                'id' => 41,
                'amount' => '7706.19',
                'deduction_id' => 10,
                'user_id' => 6,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:35:29',
                'updated_at' => '2025-06-24 16:35:29',
            ),
            41 => 
            array (
                'id' => 42,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 6,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:35:43',
                'updated_at' => '2025-06-24 16:35:43',
            ),
            42 => 
            array (
                'id' => 43,
                'amount' => '900.00',
                'deduction_id' => 12,
                'user_id' => 6,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:35:56',
                'updated_at' => '2025-06-24 16:35:56',
            ),
            43 => 
            array (
                'id' => 44,
                'amount' => '6300.00',
                'deduction_id' => 13,
                'user_id' => 6,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:36:09',
                'updated_at' => '2025-06-24 16:36:09',
            ),
            44 => 
            array (
                'id' => 45,
                'amount' => '19602.36',
                'deduction_id' => 14,
                'user_id' => 6,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:36:33',
                'updated_at' => '2025-06-24 16:36:33',
            ),
            45 => 
            array (
                'id' => 46,
                'amount' => '1322.67',
                'deduction_id' => 1,
                'user_id' => 14,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:42:22',
                'updated_at' => '2025-06-24 16:42:22',
            ),
            46 => 
            array (
                'id' => 47,
                'amount' => '10000.00',
                'deduction_id' => 2,
                'user_id' => 14,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:42:31',
                'updated_at' => '2025-06-24 16:42:31',
            ),
            47 => 
            array (
                'id' => 48,
                'amount' => '4761.63',
                'deduction_id' => 7,
                'user_id' => 14,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:43:03',
                'updated_at' => '2025-06-24 16:43:03',
            ),
            48 => 
            array (
                'id' => 49,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 14,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:43:16',
                'updated_at' => '2025-06-24 16:43:16',
            ),
            49 => 
            array (
                'id' => 50,
                'amount' => '5003.39',
                'deduction_id' => 14,
                'user_id' => 14,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:43:51',
                'updated_at' => '2025-06-24 16:43:51',
            ),
            50 => 
            array (
                'id' => 51,
                'amount' => '1089.00',
                'deduction_id' => 1,
                'user_id' => 36,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:48:19',
                'updated_at' => '2025-06-24 16:48:19',
            ),
            51 => 
            array (
                'id' => 52,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 36,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:48:31',
                'updated_at' => '2025-06-24 16:48:31',
            ),
            52 => 
            array (
                'id' => 53,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 36,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:48:44',
                'updated_at' => '2025-06-24 16:48:44',
            ),
            53 => 
            array (
                'id' => 54,
                'amount' => '1350.00',
                'deduction_id' => 12,
                'user_id' => 36,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:48:58',
                'updated_at' => '2025-06-24 16:48:58',
            ),
            54 => 
            array (
                'id' => 55,
                'amount' => '4619.34',
                'deduction_id' => 14,
                'user_id' => 36,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:49:14',
                'updated_at' => '2025-06-24 16:49:14',
            ),
            55 => 
            array (
                'id' => 56,
                'amount' => '3920.40',
                'deduction_id' => 7,
                'user_id' => 36,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:51:07',
                'updated_at' => '2025-06-24 16:51:07',
            ),
            56 => 
            array (
                'id' => 57,
                'amount' => '1409.75',
                'deduction_id' => 1,
                'user_id' => 33,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:53:21',
                'updated_at' => '2025-06-24 16:53:21',
            ),
            57 => 
            array (
                'id' => 58,
                'amount' => '500.00',
                'deduction_id' => 2,
                'user_id' => 33,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:53:44',
                'updated_at' => '2025-06-24 16:53:44',
            ),
            58 => 
            array (
                'id' => 59,
                'amount' => '5075.10',
                'deduction_id' => 7,
                'user_id' => 33,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:54:39',
                'updated_at' => '2025-06-24 16:54:39',
            ),
            59 => 
            array (
                'id' => 60,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 33,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:54:51',
                'updated_at' => '2025-06-24 16:54:51',
            ),
            60 => 
            array (
                'id' => 61,
                'amount' => '825.00',
                'deduction_id' => 12,
                'user_id' => 33,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:55:01',
                'updated_at' => '2025-06-24 16:55:01',
            ),
            61 => 
            array (
                'id' => 62,
                'amount' => '1350.00',
                'deduction_id' => 13,
                'user_id' => 33,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:55:14',
                'updated_at' => '2025-06-24 16:55:14',
            ),
            62 => 
            array (
                'id' => 63,
                'amount' => '5730.22',
                'deduction_id' => 14,
                'user_id' => 33,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:55:32',
                'updated_at' => '2025-06-24 16:55:32',
            ),
            63 => 
            array (
                'id' => 64,
                'amount' => '1954.05',
                'deduction_id' => 1,
                'user_id' => 21,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:59:25',
                'updated_at' => '2025-06-24 16:59:25',
            ),
            64 => 
            array (
                'id' => 65,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 21,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:59:38',
                'updated_at' => '2025-06-24 16:59:38',
            ),
            65 => 
            array (
                'id' => 66,
                'amount' => '5000.00',
                'deduction_id' => 3,
                'user_id' => 21,
                'is_active' => 1,
                'created_at' => '2025-06-24 16:59:47',
                'updated_at' => '2025-06-24 16:59:47',
            ),
            66 => 
            array (
                'id' => 67,
                'amount' => '7034.58',
                'deduction_id' => 7,
                'user_id' => 21,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:00:06',
                'updated_at' => '2025-06-24 17:00:06',
            ),
            67 => 
            array (
                'id' => 68,
                'amount' => '6104.77',
                'deduction_id' => 10,
                'user_id' => 21,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:00:27',
                'updated_at' => '2025-06-24 17:00:27',
            ),
            68 => 
            array (
                'id' => 69,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 21,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:00:40',
                'updated_at' => '2025-06-24 17:00:40',
            ),
            69 => 
            array (
                'id' => 70,
                'amount' => '1650.00',
                'deduction_id' => 12,
                'user_id' => 21,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:00:59',
                'updated_at' => '2025-06-24 17:00:59',
            ),
            70 => 
            array (
                'id' => 71,
                'amount' => '1500.00',
                'deduction_id' => 13,
                'user_id' => 21,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:01:51',
                'updated_at' => '2025-06-24 17:01:51',
            ),
            71 => 
            array (
                'id' => 72,
                'amount' => '8884.17',
                'deduction_id' => 14,
                'user_id' => 21,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:02:09',
                'updated_at' => '2025-06-24 17:02:09',
            ),
            72 => 
            array (
                'id' => 73,
                'amount' => '1954.05',
                'deduction_id' => 1,
                'user_id' => 31,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:03:20',
                'updated_at' => '2025-06-24 17:03:20',
            ),
            73 => 
            array (
                'id' => 74,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 31,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:03:29',
                'updated_at' => '2025-06-24 17:03:29',
            ),
            74 => 
            array (
                'id' => 75,
                'amount' => '7034.58',
                'deduction_id' => 7,
                'user_id' => 31,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:03:48',
                'updated_at' => '2025-06-24 17:03:48',
            ),
            75 => 
            array (
                'id' => 76,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 31,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:04:02',
                'updated_at' => '2025-06-24 17:04:02',
            ),
            76 => 
            array (
                'id' => 77,
                'amount' => '8884.17',
                'deduction_id' => 14,
                'user_id' => 31,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:04:48',
                'updated_at' => '2025-06-24 17:04:48',
            ),
            77 => 
            array (
                'id' => 78,
                'amount' => '1089.00',
                'deduction_id' => 1,
                'user_id' => 44,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:06:10',
                'updated_at' => '2025-06-24 17:06:10',
            ),
            78 => 
            array (
                'id' => 79,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 44,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:06:21',
                'updated_at' => '2025-06-24 17:06:21',
            ),
            79 => 
            array (
                'id' => 80,
                'amount' => '3920.40',
                'deduction_id' => 7,
                'user_id' => 44,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:06:41',
                'updated_at' => '2025-06-24 17:06:41',
            ),
            80 => 
            array (
                'id' => 81,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 44,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:06:54',
                'updated_at' => '2025-06-24 17:06:54',
            ),
            81 => 
            array (
                'id' => 82,
                'amount' => '750.00',
                'deduction_id' => 12,
                'user_id' => 44,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:07:09',
                'updated_at' => '2025-06-24 17:07:09',
            ),
            82 => 
            array (
                'id' => 83,
                'amount' => '4619.34',
                'deduction_id' => 14,
                'user_id' => 44,
                'is_active' => 1,
                'created_at' => '2025-06-24 17:07:31',
                'updated_at' => '2025-06-24 17:07:31',
            ),
            83 => 
            array (
                'id' => 84,
                'amount' => '1282.60',
                'deduction_id' => 1,
                'user_id' => 17,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:08:55',
                'updated_at' => '2025-06-24 19:08:55',
            ),
            84 => 
            array (
                'id' => 85,
                'amount' => '500.00',
                'deduction_id' => 2,
                'user_id' => 17,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:09:11',
                'updated_at' => '2025-06-24 19:09:11',
            ),
            85 => 
            array (
                'id' => 86,
                'amount' => '500.00',
                'deduction_id' => 3,
                'user_id' => 17,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:09:27',
                'updated_at' => '2025-06-24 19:09:27',
            ),
            86 => 
            array (
                'id' => 87,
                'amount' => '486.43',
                'deduction_id' => 6,
                'user_id' => 17,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:09:45',
                'updated_at' => '2025-06-24 19:09:45',
            ),
            87 => 
            array (
                'id' => 88,
                'amount' => '4617.36',
                'deduction_id' => 7,
                'user_id' => 17,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:10:01',
                'updated_at' => '2025-06-24 19:10:01',
            ),
            88 => 
            array (
                'id' => 89,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 17,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:10:13',
                'updated_at' => '2025-06-24 19:10:13',
            ),
            89 => 
            array (
                'id' => 90,
                'amount' => '900.00',
                'deduction_id' => 12,
                'user_id' => 17,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:10:26',
                'updated_at' => '2025-06-24 19:10:26',
            ),
            90 => 
            array (
                'id' => 91,
                'amount' => '6157.09',
                'deduction_id' => 14,
                'user_id' => 17,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:10:43',
                'updated_at' => '2025-06-24 19:10:43',
            ),
            91 => 
            array (
                'id' => 92,
                'amount' => '1954.05',
                'deduction_id' => 1,
                'user_id' => 16,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:12:07',
                'updated_at' => '2025-06-24 19:12:07',
            ),
            92 => 
            array (
                'id' => 93,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 16,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:12:18',
                'updated_at' => '2025-06-24 19:12:18',
            ),
            93 => 
            array (
                'id' => 94,
                'amount' => '7034.58',
                'deduction_id' => 7,
                'user_id' => 16,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:12:41',
                'updated_at' => '2025-06-24 19:12:41',
            ),
            94 => 
            array (
                'id' => 95,
                'amount' => '500.00',
                'deduction_id' => 9,
                'user_id' => 16,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:13:18',
                'updated_at' => '2025-06-24 19:13:18',
            ),
            95 => 
            array (
                'id' => 96,
                'amount' => '11141.09',
                'deduction_id' => 10,
                'user_id' => 16,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:13:34',
                'updated_at' => '2025-06-24 19:13:34',
            ),
            96 => 
            array (
                'id' => 97,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 16,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:13:44',
                'updated_at' => '2025-06-24 19:13:44',
            ),
            97 => 
            array (
                'id' => 98,
                'amount' => '1950.00',
                'deduction_id' => 12,
                'user_id' => 16,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:13:59',
                'updated_at' => '2025-06-24 19:13:59',
            ),
            98 => 
            array (
                'id' => 99,
                'amount' => '1800.00',
                'deduction_id' => 13,
                'user_id' => 16,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:14:13',
                'updated_at' => '2025-06-24 19:14:13',
            ),
            99 => 
            array (
                'id' => 100,
                'amount' => '8266.69',
                'deduction_id' => 14,
                'user_id' => 16,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:14:28',
                'updated_at' => '2025-06-24 19:14:28',
            ),
            100 => 
            array (
                'id' => 101,
                'amount' => '1089.00',
                'deduction_id' => 1,
                'user_id' => 52,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:15:52',
                'updated_at' => '2025-06-24 19:15:52',
            ),
            101 => 
            array (
                'id' => 102,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 52,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:16:05',
                'updated_at' => '2025-06-24 19:16:05',
            ),
            102 => 
            array (
                'id' => 103,
                'amount' => '3920.40',
                'deduction_id' => 7,
                'user_id' => 52,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:18:37',
                'updated_at' => '2025-06-24 19:18:37',
            ),
            103 => 
            array (
                'id' => 104,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 52,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:18:51',
                'updated_at' => '2025-06-24 19:18:51',
            ),
            104 => 
            array (
                'id' => 105,
                'amount' => '750.00',
                'deduction_id' => 12,
                'user_id' => 52,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:20:14',
                'updated_at' => '2025-06-24 19:20:14',
            ),
            105 => 
            array (
                'id' => 106,
                'amount' => '4619.34',
                'deduction_id' => 14,
                'user_id' => 52,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:20:32',
                'updated_at' => '2025-06-24 19:20:32',
            ),
            106 => 
            array (
                'id' => 107,
                'amount' => '1409.75',
                'deduction_id' => 1,
                'user_id' => 25,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:21:41',
                'updated_at' => '2025-06-24 19:21:41',
            ),
            107 => 
            array (
                'id' => 108,
                'amount' => '1000.00',
                'deduction_id' => 2,
                'user_id' => 25,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:21:50',
                'updated_at' => '2025-06-24 19:21:50',
            ),
            108 => 
            array (
                'id' => 109,
                'amount' => '10000.00',
                'deduction_id' => 3,
                'user_id' => 25,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:22:01',
                'updated_at' => '2025-06-24 19:22:01',
            ),
            109 => 
            array (
                'id' => 110,
                'amount' => '5075.10',
                'deduction_id' => 7,
                'user_id' => 25,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:22:15',
                'updated_at' => '2025-06-24 19:22:15',
            ),
            110 => 
            array (
                'id' => 111,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 25,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:22:24',
                'updated_at' => '2025-06-24 19:22:24',
            ),
            111 => 
            array (
                'id' => 112,
                'amount' => '825.00',
                'deduction_id' => 12,
                'user_id' => 25,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:22:36',
                'updated_at' => '2025-06-24 19:22:36',
            ),
            112 => 
            array (
                'id' => 113,
                'amount' => '11534.90',
                'deduction_id' => 14,
                'user_id' => 25,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:22:53',
                'updated_at' => '2025-06-24 19:22:53',
            ),
            113 => 
            array (
                'id' => 114,
                'amount' => '860.52',
                'deduction_id' => 1,
                'user_id' => 51,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:24:03',
                'updated_at' => '2025-06-24 19:24:03',
            ),
            114 => 
            array (
                'id' => 115,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 51,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:24:11',
                'updated_at' => '2025-06-24 19:24:11',
            ),
            115 => 
            array (
                'id' => 116,
                'amount' => '3097.89',
                'deduction_id' => 7,
                'user_id' => 51,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:24:29',
                'updated_at' => '2025-06-24 19:24:29',
            ),
            116 => 
            array (
                'id' => 117,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 51,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:24:45',
                'updated_at' => '2025-06-24 19:24:45',
            ),
            117 => 
            array (
                'id' => 118,
                'amount' => '4196.52',
                'deduction_id' => 14,
                'user_id' => 51,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:25:02',
                'updated_at' => '2025-06-24 19:25:02',
            ),
            118 => 
            array (
                'id' => 119,
                'amount' => '1282.60',
                'deduction_id' => 1,
                'user_id' => 2,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:27:49',
                'updated_at' => '2025-06-24 19:27:49',
            ),
            119 => 
            array (
                'id' => 120,
                'amount' => '1000.00',
                'deduction_id' => 2,
                'user_id' => 2,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:28:02',
                'updated_at' => '2025-06-24 19:28:02',
            ),
            120 => 
            array (
                'id' => 121,
                'amount' => '1000.00',
                'deduction_id' => 3,
                'user_id' => 2,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:28:08',
                'updated_at' => '2025-06-24 19:28:08',
            ),
            121 => 
            array (
                'id' => 122,
                'amount' => '4617.36',
                'deduction_id' => 7,
                'user_id' => 2,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:28:22',
                'updated_at' => '2025-06-24 19:28:22',
            ),
            122 => 
            array (
                'id' => 123,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 2,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:28:33',
                'updated_at' => '2025-06-24 19:28:33',
            ),
            123 => 
            array (
                'id' => 124,
                'amount' => '1200.00',
                'deduction_id' => 12,
                'user_id' => 2,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:28:43',
                'updated_at' => '2025-06-24 19:28:43',
            ),
            124 => 
            array (
                'id' => 125,
                'amount' => '2700.00',
                'deduction_id' => 13,
                'user_id' => 2,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:29:11',
                'updated_at' => '2025-06-24 19:29:11',
            ),
            125 => 
            array (
                'id' => 126,
                'amount' => '4304.36',
                'deduction_id' => 14,
                'user_id' => 2,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:29:33',
                'updated_at' => '2025-06-24 19:29:33',
            ),
            126 => 
            array (
                'id' => 127,
                'amount' => '1089.00',
                'deduction_id' => 1,
                'user_id' => 28,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:30:21',
                'updated_at' => '2025-06-24 19:30:21',
            ),
            127 => 
            array (
                'id' => 128,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 28,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:30:29',
                'updated_at' => '2025-06-24 19:30:29',
            ),
            128 => 
            array (
                'id' => 129,
                'amount' => '3920.40',
                'deduction_id' => 7,
                'user_id' => 28,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:30:53',
                'updated_at' => '2025-06-24 19:30:53',
            ),
            129 => 
            array (
                'id' => 130,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 28,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:31:08',
                'updated_at' => '2025-06-24 19:31:08',
            ),
            130 => 
            array (
                'id' => 131,
                'amount' => '3000.00',
                'deduction_id' => 12,
                'user_id' => 28,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:31:22',
                'updated_at' => '2025-06-24 19:31:22',
            ),
            131 => 
            array (
                'id' => 132,
                'amount' => '4619.34',
                'deduction_id' => 14,
                'user_id' => 28,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:31:44',
                'updated_at' => '2025-06-24 19:31:44',
            ),
            132 => 
            array (
                'id' => 133,
                'amount' => '420.82',
                'deduction_id' => 1,
                'user_id' => 38,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:33:26',
                'updated_at' => '2025-06-24 19:33:26',
            ),
            133 => 
            array (
                'id' => 134,
                'amount' => '500.00',
                'deduction_id' => 2,
                'user_id' => 38,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:33:36',
                'updated_at' => '2025-06-24 19:33:36',
            ),
            134 => 
            array (
                'id' => 135,
                'amount' => '2724.85',
                'deduction_id' => 6,
                'user_id' => 38,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:33:53',
                'updated_at' => '2025-06-24 19:33:53',
            ),
            135 => 
            array (
                'id' => 136,
                'amount' => '1514.97',
                'deduction_id' => 7,
                'user_id' => 38,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:34:07',
                'updated_at' => '2025-06-24 19:34:07',
            ),
            136 => 
            array (
                'id' => 137,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 38,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:34:16',
                'updated_at' => '2025-06-24 19:34:16',
            ),
            137 => 
            array (
                'id' => 138,
                'amount' => '3000.00',
                'deduction_id' => 12,
                'user_id' => 38,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:34:23',
                'updated_at' => '2025-06-24 19:34:23',
            ),
            138 => 
            array (
                'id' => 139,
                'amount' => '585.27',
                'deduction_id' => 1,
                'user_id' => 15,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:36:05',
                'updated_at' => '2025-06-24 19:36:05',
            ),
            139 => 
            array (
                'id' => 140,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 15,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:36:12',
                'updated_at' => '2025-06-24 19:36:12',
            ),
            140 => 
            array (
                'id' => 141,
                'amount' => '1996.25',
                'deduction_id' => 5,
                'user_id' => 15,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:36:30',
                'updated_at' => '2025-06-24 19:36:30',
            ),
            141 => 
            array (
                'id' => 142,
                'amount' => '2106.99',
                'deduction_id' => 7,
                'user_id' => 15,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:36:46',
                'updated_at' => '2025-06-24 19:36:46',
            ),
            142 => 
            array (
                'id' => 143,
                'amount' => '100.00',
                'deduction_id' => 9,
                'user_id' => 15,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:36:56',
                'updated_at' => '2025-06-24 19:36:56',
            ),
            143 => 
            array (
                'id' => 144,
                'amount' => '3332.15',
                'deduction_id' => 10,
                'user_id' => 15,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:37:10',
                'updated_at' => '2025-06-24 19:37:10',
            ),
            144 => 
            array (
                'id' => 145,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 15,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:37:18',
                'updated_at' => '2025-06-24 19:37:18',
            ),
            145 => 
            array (
                'id' => 146,
                'amount' => '750.00',
                'deduction_id' => 12,
                'user_id' => 15,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:37:29',
                'updated_at' => '2025-06-24 19:37:29',
            ),
            146 => 
            array (
                'id' => 147,
                'amount' => '674.43',
                'deduction_id' => 14,
                'user_id' => 15,
                'is_active' => 1,
                'created_at' => '2025-06-24 19:37:42',
                'updated_at' => '2025-06-24 19:37:42',
            ),
            147 => 
            array (
                'id' => 148,
                'amount' => '860.52',
                'deduction_id' => 1,
                'user_id' => 7,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:16:17',
                'updated_at' => '2025-06-24 20:16:17',
            ),
            148 => 
            array (
                'id' => 149,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 7,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:16:25',
                'updated_at' => '2025-06-24 20:16:25',
            ),
            149 => 
            array (
                'id' => 150,
                'amount' => '3097.89',
                'deduction_id' => 7,
                'user_id' => 7,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:16:39',
                'updated_at' => '2025-06-24 20:16:39',
            ),
            150 => 
            array (
                'id' => 151,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 7,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:16:49',
                'updated_at' => '2025-06-24 20:16:49',
            ),
            151 => 
            array (
                'id' => 152,
                'amount' => '2400.00',
                'deduction_id' => 12,
                'user_id' => 7,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:16:57',
                'updated_at' => '2025-06-24 20:16:57',
            ),
            152 => 
            array (
                'id' => 153,
                'amount' => '1500.00',
                'deduction_id' => 13,
                'user_id' => 7,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:17:10',
                'updated_at' => '2025-06-24 20:17:10',
            ),
            153 => 
            array (
                'id' => 154,
                'amount' => '2651.14',
                'deduction_id' => 14,
                'user_id' => 7,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:17:24',
                'updated_at' => '2025-06-24 20:17:24',
            ),
            154 => 
            array (
                'id' => 155,
                'amount' => '2454.62',
                'deduction_id' => 1,
                'user_id' => 29,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:19:12',
                'updated_at' => '2025-06-24 20:19:12',
            ),
            155 => 
            array (
                'id' => 156,
                'amount' => '400.00',
                'deduction_id' => 2,
                'user_id' => 29,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:19:21',
                'updated_at' => '2025-06-24 20:19:21',
            ),
            156 => 
            array (
                'id' => 157,
                'amount' => '8836.65',
                'deduction_id' => 7,
                'user_id' => 29,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:19:40',
                'updated_at' => '2025-06-24 20:19:40',
            ),
            157 => 
            array (
                'id' => 158,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 29,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:19:49',
                'updated_at' => '2025-06-24 20:19:49',
            ),
            158 => 
            array (
                'id' => 159,
                'amount' => '3600.00',
                'deduction_id' => 13,
                'user_id' => 29,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:20:02',
                'updated_at' => '2025-06-24 20:20:02',
            ),
            159 => 
            array (
                'id' => 160,
                'amount' => '19470.40',
                'deduction_id' => 14,
                'user_id' => 29,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:20:19',
                'updated_at' => '2025-06-24 20:20:19',
            ),
            160 => 
            array (
                'id' => 161,
                'amount' => '2454.62',
                'deduction_id' => 1,
                'user_id' => 20,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:21:05',
                'updated_at' => '2025-06-24 20:21:05',
            ),
            161 => 
            array (
                'id' => 162,
                'amount' => '500.00',
                'deduction_id' => 2,
                'user_id' => 20,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:21:15',
                'updated_at' => '2025-06-24 20:21:15',
            ),
            162 => 
            array (
                'id' => 163,
                'amount' => '8349.93',
                'deduction_id' => 4,
                'user_id' => 20,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:21:30',
                'updated_at' => '2025-06-24 20:21:30',
            ),
            163 => 
            array (
                'id' => 164,
                'amount' => '8836.65',
                'deduction_id' => 7,
                'user_id' => 20,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:21:52',
                'updated_at' => '2025-06-24 20:21:52',
            ),
            164 => 
            array (
                'id' => 165,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 20,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:21:58',
                'updated_at' => '2025-06-24 20:21:58',
            ),
            165 => 
            array (
                'id' => 166,
                'amount' => '1725.00',
                'deduction_id' => 12,
                'user_id' => 20,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:22:17',
                'updated_at' => '2025-06-24 20:22:17',
            ),
            166 => 
            array (
                'id' => 167,
                'amount' => '5175.00',
                'deduction_id' => 13,
                'user_id' => 20,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:22:30',
                'updated_at' => '2025-06-24 20:22:30',
            ),
            167 => 
            array (
                'id' => 168,
                'amount' => '20464.52',
                'deduction_id' => 14,
                'user_id' => 20,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:22:46',
                'updated_at' => '2025-06-24 20:22:46',
            ),
            168 => 
            array (
                'id' => 169,
                'amount' => '1954.05',
                'deduction_id' => 1,
                'user_id' => 32,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:31:49',
                'updated_at' => '2025-06-24 20:31:49',
            ),
            169 => 
            array (
                'id' => 170,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 32,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:31:56',
                'updated_at' => '2025-06-24 20:31:56',
            ),
            170 => 
            array (
                'id' => 171,
                'amount' => '7034.58',
                'deduction_id' => 7,
                'user_id' => 32,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:32:15',
                'updated_at' => '2025-06-24 20:32:15',
            ),
            171 => 
            array (
                'id' => 172,
                'amount' => '10092.25',
                'deduction_id' => 10,
                'user_id' => 32,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:32:35',
                'updated_at' => '2025-06-24 20:32:35',
            ),
            172 => 
            array (
                'id' => 173,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 32,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:32:43',
                'updated_at' => '2025-06-24 20:32:43',
            ),
            173 => 
            array (
                'id' => 174,
                'amount' => '8884.17',
                'deduction_id' => 14,
                'user_id' => 32,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:33:04',
                'updated_at' => '2025-06-24 20:33:04',
            ),
            174 => 
            array (
                'id' => 175,
                'amount' => '2454.62',
                'deduction_id' => 1,
                'user_id' => 3,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:33:57',
                'updated_at' => '2025-06-24 20:33:57',
            ),
            175 => 
            array (
                'id' => 176,
                'amount' => '2500.00',
                'deduction_id' => 2,
                'user_id' => 3,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:34:04',
                'updated_at' => '2025-06-24 20:34:04',
            ),
            176 => 
            array (
                'id' => 177,
                'amount' => '4000.00',
                'deduction_id' => 3,
                'user_id' => 3,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:34:13',
                'updated_at' => '2025-06-24 20:34:13',
            ),
            177 => 
            array (
                'id' => 178,
                'amount' => '8836.65',
                'deduction_id' => 7,
                'user_id' => 3,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:34:29',
                'updated_at' => '2025-06-24 20:34:29',
            ),
            178 => 
            array (
                'id' => 179,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 3,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:34:39',
                'updated_at' => '2025-06-24 20:34:39',
            ),
            179 => 
            array (
                'id' => 180,
                'amount' => '21914.12',
                'deduction_id' => 14,
                'user_id' => 3,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:34:53',
                'updated_at' => '2025-06-24 20:34:53',
            ),
            180 => 
            array (
                'id' => 181,
                'amount' => '1409.75',
                'deduction_id' => 1,
                'user_id' => 34,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:35:55',
                'updated_at' => '2025-06-24 20:35:55',
            ),
            181 => 
            array (
                'id' => 182,
                'amount' => '800.00',
                'deduction_id' => 2,
                'user_id' => 34,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:36:04',
                'updated_at' => '2025-06-24 20:36:04',
            ),
            182 => 
            array (
                'id' => 183,
                'amount' => '762.39',
                'deduction_id' => 5,
                'user_id' => 34,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:36:23',
                'updated_at' => '2025-06-24 20:36:23',
            ),
            183 => 
            array (
                'id' => 184,
                'amount' => '5075.10',
                'deduction_id' => 7,
                'user_id' => 34,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:36:36',
                'updated_at' => '2025-06-24 20:36:36',
            ),
            184 => 
            array (
                'id' => 185,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 34,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:36:45',
                'updated_at' => '2025-06-24 20:36:45',
            ),
            185 => 
            array (
                'id' => 186,
                'amount' => '1500.00',
                'deduction_id' => 12,
                'user_id' => 34,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:36:54',
                'updated_at' => '2025-06-24 20:36:54',
            ),
            186 => 
            array (
                'id' => 187,
                'amount' => '4730.22',
                'deduction_id' => 14,
                'user_id' => 34,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:37:08',
                'updated_at' => '2025-06-24 20:37:08',
            ),
            187 => 
            array (
                'id' => 188,
                'amount' => '860.52',
                'deduction_id' => 1,
                'user_id' => 47,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:38:07',
                'updated_at' => '2025-06-24 20:38:07',
            ),
            188 => 
            array (
                'id' => 189,
                'amount' => '200.00',
                'deduction_id' => 2,
                'user_id' => 47,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:38:15',
                'updated_at' => '2025-06-24 20:38:15',
            ),
            189 => 
            array (
                'id' => 190,
                'amount' => '3097.89',
                'deduction_id' => 7,
                'user_id' => 47,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:38:30',
                'updated_at' => '2025-06-24 20:38:30',
            ),
            190 => 
            array (
                'id' => 191,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 47,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:38:41',
                'updated_at' => '2025-06-24 20:38:41',
            ),
            191 => 
            array (
                'id' => 192,
                'amount' => '1500.00',
                'deduction_id' => 12,
                'user_id' => 47,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:38:53',
                'updated_at' => '2025-06-24 20:38:53',
            ),
            192 => 
            array (
                'id' => 193,
                'amount' => '4196.52',
                'deduction_id' => 14,
                'user_id' => 47,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:39:19',
                'updated_at' => '2025-06-24 20:39:19',
            ),
            193 => 
            array (
                'id' => 194,
                'amount' => '1133.45',
                'deduction_id' => 1,
                'user_id' => 4,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:43:58',
                'updated_at' => '2025-06-24 20:43:58',
            ),
            194 => 
            array (
                'id' => 195,
                'amount' => '600.00',
                'deduction_id' => 2,
                'user_id' => 4,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:44:05',
                'updated_at' => '2025-06-24 20:44:05',
            ),
            195 => 
            array (
                'id' => 196,
                'amount' => '6028.51',
                'deduction_id' => 5,
                'user_id' => 4,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:44:21',
                'updated_at' => '2025-06-24 20:44:21',
            ),
            196 => 
            array (
                'id' => 197,
                'amount' => '4080.42',
                'deduction_id' => 7,
                'user_id' => 4,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:44:36',
                'updated_at' => '2025-06-24 20:44:36',
            ),
            197 => 
            array (
                'id' => 198,
                'amount' => '1000.00',
                'deduction_id' => 9,
                'user_id' => 4,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:44:50',
                'updated_at' => '2025-06-24 20:44:50',
            ),
            198 => 
            array (
                'id' => 199,
                'amount' => '9168.10',
                'deduction_id' => 10,
                'user_id' => 4,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:45:04',
                'updated_at' => '2025-06-24 20:45:04',
            ),
            199 => 
            array (
                'id' => 200,
                'amount' => '100.00',
                'deduction_id' => 11,
                'user_id' => 4,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:45:13',
                'updated_at' => '2025-06-24 20:45:13',
            ),
            200 => 
            array (
                'id' => 201,
                'amount' => '2260.61',
                'deduction_id' => 14,
                'user_id' => 4,
                'is_active' => 1,
                'created_at' => '2025-06-24 20:45:29',
                'updated_at' => '2025-06-24 20:45:29',
            ),
            201 => 
            array (
                'id' => 202,
                'amount' => '1085.58',
                'deduction_id' => 8,
                'user_id' => 24,
                'is_active' => 1,
                'created_at' => '2025-06-24 21:37:45',
                'updated_at' => '2025-06-24 21:37:45',
            ),
            202 => 
            array (
                'id' => 203,
                'amount' => '750.00',
                'deduction_id' => 12,
                'user_id' => 51,
                'is_active' => 1,
                'created_at' => '2025-06-24 23:44:06',
                'updated_at' => '2025-06-24 23:44:06',
            ),
        ));

        
    }
}