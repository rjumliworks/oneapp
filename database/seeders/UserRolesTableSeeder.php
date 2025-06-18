<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_roles')->delete();
        
        \DB::table('user_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'role_id' => 1,
                'created_at' => '2025-06-18 09:45:52',
                'updated_at' => '2025-06-18 09:45:52',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'role_id' => 2,
                'created_at' => '2025-06-18 09:45:52',
                'updated_at' => '2025-06-18 09:45:52',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:54',
                'updated_at' => '2025-06-18 09:46:54',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 3,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:55',
                'updated_at' => '2025-06-18 09:46:55',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 4,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:55',
                'updated_at' => '2025-06-18 09:46:55',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 5,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:55',
                'updated_at' => '2025-06-18 09:46:55',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 6,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:56',
                'updated_at' => '2025-06-18 09:46:56',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 7,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:56',
                'updated_at' => '2025-06-18 09:46:56',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 8,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:57',
                'updated_at' => '2025-06-18 09:46:57',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 9,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:57',
                'updated_at' => '2025-06-18 09:46:57',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 10,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:57',
                'updated_at' => '2025-06-18 09:46:57',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 11,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:58',
                'updated_at' => '2025-06-18 09:46:58',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 12,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:58',
                'updated_at' => '2025-06-18 09:46:58',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 13,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:59',
                'updated_at' => '2025-06-18 09:46:59',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 14,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:59',
                'updated_at' => '2025-06-18 09:46:59',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 15,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:46:59',
                'updated_at' => '2025-06-18 09:46:59',
            ),
            16 => 
            array (
                'id' => 17,
                'user_id' => 16,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:00',
                'updated_at' => '2025-06-18 09:47:00',
            ),
            17 => 
            array (
                'id' => 18,
                'user_id' => 17,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:00',
                'updated_at' => '2025-06-18 09:47:00',
            ),
            18 => 
            array (
                'id' => 19,
                'user_id' => 18,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:00',
                'updated_at' => '2025-06-18 09:47:00',
            ),
            19 => 
            array (
                'id' => 20,
                'user_id' => 19,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:01',
                'updated_at' => '2025-06-18 09:47:01',
            ),
            20 => 
            array (
                'id' => 21,
                'user_id' => 20,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:01',
                'updated_at' => '2025-06-18 09:47:01',
            ),
            21 => 
            array (
                'id' => 22,
                'user_id' => 21,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:02',
                'updated_at' => '2025-06-18 09:47:02',
            ),
            22 => 
            array (
                'id' => 23,
                'user_id' => 22,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:02',
                'updated_at' => '2025-06-18 09:47:02',
            ),
            23 => 
            array (
                'id' => 24,
                'user_id' => 23,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:02',
                'updated_at' => '2025-06-18 09:47:02',
            ),
            24 => 
            array (
                'id' => 25,
                'user_id' => 24,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:03',
                'updated_at' => '2025-06-18 09:47:03',
            ),
            25 => 
            array (
                'id' => 26,
                'user_id' => 25,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:03',
                'updated_at' => '2025-06-18 09:47:03',
            ),
            26 => 
            array (
                'id' => 27,
                'user_id' => 26,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:03',
                'updated_at' => '2025-06-18 09:47:03',
            ),
            27 => 
            array (
                'id' => 28,
                'user_id' => 27,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:04',
                'updated_at' => '2025-06-18 09:47:04',
            ),
            28 => 
            array (
                'id' => 29,
                'user_id' => 28,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:04',
                'updated_at' => '2025-06-18 09:47:04',
            ),
            29 => 
            array (
                'id' => 30,
                'user_id' => 29,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:05',
                'updated_at' => '2025-06-18 09:47:05',
            ),
            30 => 
            array (
                'id' => 31,
                'user_id' => 30,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:05',
                'updated_at' => '2025-06-18 09:47:05',
            ),
            31 => 
            array (
                'id' => 32,
                'user_id' => 31,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:05',
                'updated_at' => '2025-06-18 09:47:05',
            ),
            32 => 
            array (
                'id' => 33,
                'user_id' => 32,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:06',
                'updated_at' => '2025-06-18 09:47:06',
            ),
            33 => 
            array (
                'id' => 34,
                'user_id' => 33,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:06',
                'updated_at' => '2025-06-18 09:47:06',
            ),
            34 => 
            array (
                'id' => 35,
                'user_id' => 34,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:07',
                'updated_at' => '2025-06-18 09:47:07',
            ),
            35 => 
            array (
                'id' => 36,
                'user_id' => 35,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:07',
                'updated_at' => '2025-06-18 09:47:07',
            ),
            36 => 
            array (
                'id' => 37,
                'user_id' => 36,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:07',
                'updated_at' => '2025-06-18 09:47:07',
            ),
            37 => 
            array (
                'id' => 38,
                'user_id' => 37,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:08',
                'updated_at' => '2025-06-18 09:47:08',
            ),
            38 => 
            array (
                'id' => 39,
                'user_id' => 38,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:08',
                'updated_at' => '2025-06-18 09:47:08',
            ),
            39 => 
            array (
                'id' => 40,
                'user_id' => 39,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:09',
                'updated_at' => '2025-06-18 09:47:09',
            ),
            40 => 
            array (
                'id' => 41,
                'user_id' => 40,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:09',
                'updated_at' => '2025-06-18 09:47:09',
            ),
            41 => 
            array (
                'id' => 42,
                'user_id' => 41,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:09',
                'updated_at' => '2025-06-18 09:47:09',
            ),
            42 => 
            array (
                'id' => 43,
                'user_id' => 42,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:10',
                'updated_at' => '2025-06-18 09:47:10',
            ),
            43 => 
            array (
                'id' => 44,
                'user_id' => 43,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:10',
                'updated_at' => '2025-06-18 09:47:10',
            ),
            44 => 
            array (
                'id' => 45,
                'user_id' => 44,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:11',
                'updated_at' => '2025-06-18 09:47:11',
            ),
            45 => 
            array (
                'id' => 46,
                'user_id' => 45,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:11',
                'updated_at' => '2025-06-18 09:47:11',
            ),
            46 => 
            array (
                'id' => 47,
                'user_id' => 46,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:11',
                'updated_at' => '2025-06-18 09:47:11',
            ),
            47 => 
            array (
                'id' => 48,
                'user_id' => 47,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:12',
                'updated_at' => '2025-06-18 09:47:12',
            ),
            48 => 
            array (
                'id' => 49,
                'user_id' => 48,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:12',
                'updated_at' => '2025-06-18 09:47:12',
            ),
            49 => 
            array (
                'id' => 50,
                'user_id' => 49,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:13',
                'updated_at' => '2025-06-18 09:47:13',
            ),
            50 => 
            array (
                'id' => 51,
                'user_id' => 50,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:13',
                'updated_at' => '2025-06-18 09:47:13',
            ),
            51 => 
            array (
                'id' => 52,
                'user_id' => 51,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:14',
                'updated_at' => '2025-06-18 09:47:14',
            ),
            52 => 
            array (
                'id' => 53,
                'user_id' => 52,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:14',
                'updated_at' => '2025-06-18 09:47:14',
            ),
            53 => 
            array (
                'id' => 54,
                'user_id' => 53,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:14',
                'updated_at' => '2025-06-18 09:47:14',
            ),
            54 => 
            array (
                'id' => 55,
                'user_id' => 54,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:15',
                'updated_at' => '2025-06-18 09:47:15',
            ),
            55 => 
            array (
                'id' => 56,
                'user_id' => 55,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:15',
                'updated_at' => '2025-06-18 09:47:15',
            ),
            56 => 
            array (
                'id' => 57,
                'user_id' => 56,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:15',
                'updated_at' => '2025-06-18 09:47:15',
            ),
            57 => 
            array (
                'id' => 58,
                'user_id' => 57,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:16',
                'updated_at' => '2025-06-18 09:47:16',
            ),
            58 => 
            array (
                'id' => 59,
                'user_id' => 58,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:16',
                'updated_at' => '2025-06-18 09:47:16',
            ),
            59 => 
            array (
                'id' => 60,
                'user_id' => 59,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:17',
                'updated_at' => '2025-06-18 09:47:17',
            ),
            60 => 
            array (
                'id' => 61,
                'user_id' => 60,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:17',
                'updated_at' => '2025-06-18 09:47:17',
            ),
            61 => 
            array (
                'id' => 62,
                'user_id' => 61,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:17',
                'updated_at' => '2025-06-18 09:47:17',
            ),
            62 => 
            array (
                'id' => 63,
                'user_id' => 62,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:18',
                'updated_at' => '2025-06-18 09:47:18',
            ),
            63 => 
            array (
                'id' => 64,
                'user_id' => 63,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:18',
                'updated_at' => '2025-06-18 09:47:18',
            ),
            64 => 
            array (
                'id' => 65,
                'user_id' => 64,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:19',
                'updated_at' => '2025-06-18 09:47:19',
            ),
            65 => 
            array (
                'id' => 66,
                'user_id' => 65,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:19',
                'updated_at' => '2025-06-18 09:47:19',
            ),
            66 => 
            array (
                'id' => 67,
                'user_id' => 66,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:19',
                'updated_at' => '2025-06-18 09:47:19',
            ),
            67 => 
            array (
                'id' => 68,
                'user_id' => 67,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:20',
                'updated_at' => '2025-06-18 09:47:20',
            ),
            68 => 
            array (
                'id' => 69,
                'user_id' => 68,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:20',
                'updated_at' => '2025-06-18 09:47:20',
            ),
            69 => 
            array (
                'id' => 70,
                'user_id' => 69,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:21',
                'updated_at' => '2025-06-18 09:47:21',
            ),
            70 => 
            array (
                'id' => 71,
                'user_id' => 70,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:21',
                'updated_at' => '2025-06-18 09:47:21',
            ),
            71 => 
            array (
                'id' => 72,
                'user_id' => 71,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:21',
                'updated_at' => '2025-06-18 09:47:21',
            ),
            72 => 
            array (
                'id' => 73,
                'user_id' => 72,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:22',
                'updated_at' => '2025-06-18 09:47:22',
            ),
            73 => 
            array (
                'id' => 74,
                'user_id' => 73,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:22',
                'updated_at' => '2025-06-18 09:47:22',
            ),
            74 => 
            array (
                'id' => 75,
                'user_id' => 74,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:23',
                'updated_at' => '2025-06-18 09:47:23',
            ),
            75 => 
            array (
                'id' => 76,
                'user_id' => 75,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:23',
                'updated_at' => '2025-06-18 09:47:23',
            ),
            76 => 
            array (
                'id' => 77,
                'user_id' => 76,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:23',
                'updated_at' => '2025-06-18 09:47:23',
            ),
            77 => 
            array (
                'id' => 78,
                'user_id' => 77,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:24',
                'updated_at' => '2025-06-18 09:47:24',
            ),
            78 => 
            array (
                'id' => 79,
                'user_id' => 78,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:24',
                'updated_at' => '2025-06-18 09:47:24',
            ),
            79 => 
            array (
                'id' => 80,
                'user_id' => 79,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:24',
                'updated_at' => '2025-06-18 09:47:24',
            ),
            80 => 
            array (
                'id' => 81,
                'user_id' => 80,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:25',
                'updated_at' => '2025-06-18 09:47:25',
            ),
            81 => 
            array (
                'id' => 82,
                'user_id' => 81,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:25',
                'updated_at' => '2025-06-18 09:47:25',
            ),
            82 => 
            array (
                'id' => 83,
                'user_id' => 82,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:26',
                'updated_at' => '2025-06-18 09:47:26',
            ),
            83 => 
            array (
                'id' => 84,
                'user_id' => 83,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:26',
                'updated_at' => '2025-06-18 09:47:26',
            ),
            84 => 
            array (
                'id' => 85,
                'user_id' => 84,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:26',
                'updated_at' => '2025-06-18 09:47:26',
            ),
            85 => 
            array (
                'id' => 86,
                'user_id' => 85,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:27',
                'updated_at' => '2025-06-18 09:47:27',
            ),
            86 => 
            array (
                'id' => 87,
                'user_id' => 86,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:27',
                'updated_at' => '2025-06-18 09:47:27',
            ),
            87 => 
            array (
                'id' => 88,
                'user_id' => 87,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:28',
                'updated_at' => '2025-06-18 09:47:28',
            ),
            88 => 
            array (
                'id' => 89,
                'user_id' => 88,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:28',
                'updated_at' => '2025-06-18 09:47:28',
            ),
            89 => 
            array (
                'id' => 90,
                'user_id' => 89,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:28',
                'updated_at' => '2025-06-18 09:47:28',
            ),
            90 => 
            array (
                'id' => 91,
                'user_id' => 90,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:29',
                'updated_at' => '2025-06-18 09:47:29',
            ),
            91 => 
            array (
                'id' => 92,
                'user_id' => 91,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:29',
                'updated_at' => '2025-06-18 09:47:29',
            ),
            92 => 
            array (
                'id' => 93,
                'user_id' => 92,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:29',
                'updated_at' => '2025-06-18 09:47:29',
            ),
            93 => 
            array (
                'id' => 94,
                'user_id' => 93,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:30',
                'updated_at' => '2025-06-18 09:47:30',
            ),
            94 => 
            array (
                'id' => 95,
                'user_id' => 94,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:30',
                'updated_at' => '2025-06-18 09:47:30',
            ),
            95 => 
            array (
                'id' => 96,
                'user_id' => 95,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:30',
                'updated_at' => '2025-06-18 09:47:30',
            ),
            96 => 
            array (
                'id' => 97,
                'user_id' => 96,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:31',
                'updated_at' => '2025-06-18 09:47:31',
            ),
            97 => 
            array (
                'id' => 98,
                'user_id' => 97,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:31',
                'updated_at' => '2025-06-18 09:47:31',
            ),
            98 => 
            array (
                'id' => 99,
                'user_id' => 98,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:31',
                'updated_at' => '2025-06-18 09:47:31',
            ),
            99 => 
            array (
                'id' => 100,
                'user_id' => 99,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:32',
                'updated_at' => '2025-06-18 09:47:32',
            ),
            100 => 
            array (
                'id' => 101,
                'user_id' => 100,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:32',
                'updated_at' => '2025-06-18 09:47:32',
            ),
            101 => 
            array (
                'id' => 102,
                'user_id' => 101,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:33',
                'updated_at' => '2025-06-18 09:47:33',
            ),
            102 => 
            array (
                'id' => 103,
                'user_id' => 102,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:33',
                'updated_at' => '2025-06-18 09:47:33',
            ),
            103 => 
            array (
                'id' => 104,
                'user_id' => 103,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:33',
                'updated_at' => '2025-06-18 09:47:33',
            ),
            104 => 
            array (
                'id' => 105,
                'user_id' => 104,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:34',
                'updated_at' => '2025-06-18 09:47:34',
            ),
            105 => 
            array (
                'id' => 106,
                'user_id' => 105,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:34',
                'updated_at' => '2025-06-18 09:47:34',
            ),
            106 => 
            array (
                'id' => 107,
                'user_id' => 106,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:35',
                'updated_at' => '2025-06-18 09:47:35',
            ),
            107 => 
            array (
                'id' => 108,
                'user_id' => 107,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:35',
                'updated_at' => '2025-06-18 09:47:35',
            ),
            108 => 
            array (
                'id' => 109,
                'user_id' => 108,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:35',
                'updated_at' => '2025-06-18 09:47:35',
            ),
            109 => 
            array (
                'id' => 110,
                'user_id' => 109,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:36',
                'updated_at' => '2025-06-18 09:47:36',
            ),
            110 => 
            array (
                'id' => 111,
                'user_id' => 110,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:36',
                'updated_at' => '2025-06-18 09:47:36',
            ),
            111 => 
            array (
                'id' => 112,
                'user_id' => 111,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:36',
                'updated_at' => '2025-06-18 09:47:36',
            ),
            112 => 
            array (
                'id' => 113,
                'user_id' => 112,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:37',
                'updated_at' => '2025-06-18 09:47:37',
            ),
            113 => 
            array (
                'id' => 114,
                'user_id' => 113,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:37',
                'updated_at' => '2025-06-18 09:47:37',
            ),
            114 => 
            array (
                'id' => 115,
                'user_id' => 114,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:37',
                'updated_at' => '2025-06-18 09:47:37',
            ),
            115 => 
            array (
                'id' => 116,
                'user_id' => 115,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:38',
                'updated_at' => '2025-06-18 09:47:38',
            ),
            116 => 
            array (
                'id' => 117,
                'user_id' => 116,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:38',
                'updated_at' => '2025-06-18 09:47:38',
            ),
            117 => 
            array (
                'id' => 118,
                'user_id' => 117,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:39',
                'updated_at' => '2025-06-18 09:47:39',
            ),
            118 => 
            array (
                'id' => 119,
                'user_id' => 118,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:39',
                'updated_at' => '2025-06-18 09:47:39',
            ),
            119 => 
            array (
                'id' => 120,
                'user_id' => 119,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:47:39',
                'updated_at' => '2025-06-18 09:47:39',
            ),
            120 => 
            array (
                'id' => 121,
                'user_id' => 120,
                'role_id' => 5,
                'created_at' => '2025-06-18 09:54:52',
                'updated_at' => '2025-06-18 09:54:52',
            ),
            121 => 
            array (
                'id' => 122,
                'user_id' => 121,
                'role_id' => 5,
                'created_at' => '2025-06-18 10:35:17',
                'updated_at' => '2025-06-18 10:35:17',
            ),
            122 => 
            array (
                'id' => 123,
                'user_id' => 122,
                'role_id' => 5,
                'created_at' => '2025-06-18 10:36:38',
                'updated_at' => '2025-06-18 10:36:38',
            ),
            123 => 
            array (
                'id' => 124,
                'user_id' => 123,
                'role_id' => 5,
                'created_at' => '2025-06-18 10:38:09',
                'updated_at' => '2025-06-18 10:38:09',
            ),
        ));

        
    }
}