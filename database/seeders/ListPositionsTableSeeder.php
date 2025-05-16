<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListPositionsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_positions')->delete();
        
        \DB::table('list_positions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'special_id' => 18,
                'administrative_id' => 158,
                'salary_id' => 1,
                'created_at' => '2024-08-29 11:51:37',
                'updated_at' => '2024-08-29 11:51:37',
            ),
            1 => 
            array (
                'id' => 2,
                'special_id' => NULL,
                'administrative_id' => 159,
                'salary_id' => 1,
                'created_at' => '2024-08-29 11:51:47',
                'updated_at' => '2024-08-29 11:51:47',
            ),
            2 => 
            array (
                'id' => 3,
                'special_id' => 19,
                'administrative_id' => 160,
                'salary_id' => 1,
                'created_at' => '2024-08-29 11:52:27',
                'updated_at' => '2024-08-29 11:52:27',
            ),
            3 => 
            array (
                'id' => 4,
                'special_id' => 20,
                'administrative_id' => 161,
                'salary_id' => 2,
                'created_at' => '2024-08-29 11:52:55',
                'updated_at' => '2024-08-29 11:52:55',
            ),
            4 => 
            array (
                'id' => 5,
                'special_id' => 21,
                'administrative_id' => 161,
                'salary_id' => 3,
                'created_at' => '2024-08-29 11:53:54',
                'updated_at' => '2024-08-29 11:53:54',
            ),
            5 => 
            array (
                'id' => 6,
                'special_id' => 22,
                'administrative_id' => 161,
                'salary_id' => 3,
                'created_at' => '2024-08-29 11:54:50',
                'updated_at' => '2024-08-29 11:54:50',
            ),
            6 => 
            array (
                'id' => 7,
                'special_id' => 23,
                'administrative_id' => 162,
                'salary_id' => 3,
                'created_at' => '2024-08-29 11:55:06',
                'updated_at' => '2024-08-29 11:55:06',
            ),
            7 => 
            array (
                'id' => 8,
                'special_id' => NULL,
                'administrative_id' => 161,
                'salary_id' => 3,
                'created_at' => '2024-08-29 11:55:30',
                'updated_at' => '2024-08-29 11:55:30',
            ),
            8 => 
            array (
                'id' => 9,
                'special_id' => 24,
                'administrative_id' => 163,
                'salary_id' => 4,
                'created_at' => '2024-08-29 11:55:52',
                'updated_at' => '2024-08-29 11:55:52',
            ),
            9 => 
            array (
                'id' => 10,
                'special_id' => 22,
                'administrative_id' => 163,
                'salary_id' => 4,
                'created_at' => '2024-08-29 11:56:06',
                'updated_at' => '2024-08-29 11:56:06',
            ),
            10 => 
            array (
                'id' => 11,
                'special_id' => 26,
                'administrative_id' => 164,
                'salary_id' => 4,
                'created_at' => '2024-08-29 11:56:26',
                'updated_at' => '2024-08-29 11:56:26',
            ),
            11 => 
            array (
                'id' => 12,
                'special_id' => 27,
                'administrative_id' => 164,
                'salary_id' => 4,
                'created_at' => '2024-08-29 11:56:44',
                'updated_at' => '2024-08-29 11:56:44',
            ),
            12 => 
            array (
                'id' => 13,
                'special_id' => NULL,
                'administrative_id' => 165,
                'salary_id' => 5,
                'created_at' => '2024-08-29 11:56:59',
                'updated_at' => '2024-08-29 11:56:59',
            ),
            13 => 
            array (
                'id' => 14,
                'special_id' => NULL,
                'administrative_id' => 166,
                'salary_id' => 5,
                'created_at' => '2024-08-29 11:57:16',
                'updated_at' => '2024-08-29 11:57:16',
            ),
            14 => 
            array (
                'id' => 15,
                'special_id' => 28,
                'administrative_id' => 166,
                'salary_id' => 6,
                'created_at' => '2024-08-29 11:57:35',
                'updated_at' => '2024-08-29 11:57:35',
            ),
            15 => 
            array (
                'id' => 16,
                'special_id' => 29,
                'administrative_id' => 168,
                'salary_id' => 6,
                'created_at' => '2024-08-29 11:57:54',
                'updated_at' => '2024-08-29 11:57:54',
            ),
            16 => 
            array (
                'id' => 17,
                'special_id' => 30,
                'administrative_id' => 167,
                'salary_id' => 6,
                'created_at' => '2024-08-29 11:58:36',
                'updated_at' => '2024-08-29 11:58:36',
            ),
            17 => 
            array (
                'id' => 18,
                'special_id' => 31,
                'administrative_id' => 167,
                'salary_id' => 6,
                'created_at' => '2024-08-29 11:58:54',
                'updated_at' => '2024-08-29 11:58:54',
            ),
            18 => 
            array (
                'id' => 19,
                'special_id' => 32,
                'administrative_id' => 168,
                'salary_id' => 6,
                'created_at' => '2024-08-29 11:59:14',
                'updated_at' => '2024-08-29 11:59:14',
            ),
            19 => 
            array (
                'id' => 20,
                'special_id' => 33,
                'administrative_id' => 169,
                'salary_id' => 7,
                'created_at' => '2024-08-29 11:59:33',
                'updated_at' => '2024-08-29 11:59:33',
            ),
            20 => 
            array (
                'id' => 21,
                'special_id' => NULL,
                'administrative_id' => 170,
                'salary_id' => 7,
                'created_at' => '2024-08-29 11:59:43',
                'updated_at' => '2024-08-29 11:59:43',
            ),
            21 => 
            array (
                'id' => 22,
                'special_id' => 34,
                'administrative_id' => 171,
                'salary_id' => 8,
                'created_at' => '2024-08-29 12:01:22',
                'updated_at' => '2024-08-29 12:01:22',
            ),
            22 => 
            array (
                'id' => 23,
                'special_id' => 35,
                'administrative_id' => 172,
                'salary_id' => 8,
                'created_at' => '2024-08-29 12:01:43',
                'updated_at' => '2024-08-29 12:01:43',
            ),
            23 => 
            array (
                'id' => 24,
                'special_id' => 36,
                'administrative_id' => 171,
                'salary_id' => 8,
                'created_at' => '2024-08-29 12:02:44',
                'updated_at' => '2024-08-29 12:02:44',
            ),
            24 => 
            array (
                'id' => 25,
                'special_id' => 37,
                'administrative_id' => 171,
                'salary_id' => 8,
                'created_at' => '2024-08-29 12:02:53',
                'updated_at' => '2024-08-29 12:02:53',
            ),
            25 => 
            array (
                'id' => 26,
                'special_id' => 38,
                'administrative_id' => 171,
                'salary_id' => 8,
                'created_at' => '2024-08-29 12:03:06',
                'updated_at' => '2024-08-29 12:03:06',
            ),
            26 => 
            array (
                'id' => 27,
                'special_id' => 39,
                'administrative_id' => 171,
                'salary_id' => 8,
                'created_at' => '2024-08-29 12:03:18',
                'updated_at' => '2024-08-29 12:03:18',
            ),
            27 => 
            array (
                'id' => 28,
                'special_id' => 40,
                'administrative_id' => 171,
                'salary_id' => 8,
                'created_at' => '2024-08-29 12:03:29',
                'updated_at' => '2024-08-29 12:03:29',
            ),
            28 => 
            array (
                'id' => 29,
                'special_id' => 42,
                'administrative_id' => 173,
                'salary_id' => 9,
                'created_at' => '2024-08-29 12:03:54',
                'updated_at' => '2024-08-29 12:03:54',
            ),
            29 => 
            array (
                'id' => 30,
                'special_id' => 43,
                'administrative_id' => 173,
                'salary_id' => 9,
                'created_at' => '2024-08-29 12:04:31',
                'updated_at' => '2024-08-29 12:04:31',
            ),
            30 => 
            array (
                'id' => 31,
                'special_id' => NULL,
                'administrative_id' => 174,
                'salary_id' => 9,
                'created_at' => '2024-08-29 12:04:44',
                'updated_at' => '2024-08-29 12:04:44',
            ),
            31 => 
            array (
                'id' => 32,
                'special_id' => 44,
                'administrative_id' => 175,
                'salary_id' => 10,
                'created_at' => '2024-08-29 12:05:08',
                'updated_at' => '2024-08-29 12:05:08',
            ),
            32 => 
            array (
                'id' => 33,
                'special_id' => 45,
                'administrative_id' => 175,
                'salary_id' => 10,
                'created_at' => '2024-08-29 12:05:25',
                'updated_at' => '2024-08-29 12:05:25',
            ),
            33 => 
            array (
                'id' => 34,
                'special_id' => NULL,
                'administrative_id' => 176,
                'salary_id' => 10,
                'created_at' => '2024-08-29 12:05:42',
                'updated_at' => '2024-08-29 12:05:42',
            ),
            34 => 
            array (
                'id' => 35,
                'special_id' => 46,
                'administrative_id' => 177,
                'salary_id' => 11,
                'created_at' => '2024-08-29 12:06:00',
                'updated_at' => '2024-08-29 12:06:00',
            ),
            35 => 
            array (
                'id' => 36,
                'special_id' => 47,
                'administrative_id' => 177,
                'salary_id' => 11,
                'created_at' => '2024-08-29 12:06:16',
                'updated_at' => '2024-08-29 12:06:16',
            ),
            36 => 
            array (
                'id' => 37,
                'special_id' => 48,
                'administrative_id' => 177,
                'salary_id' => 11,
                'created_at' => '2024-08-29 12:06:31',
                'updated_at' => '2024-08-29 12:06:31',
            ),
            37 => 
            array (
                'id' => 38,
                'special_id' => 49,
                'administrative_id' => 177,
                'salary_id' => 11,
                'created_at' => '2024-08-29 12:06:46',
                'updated_at' => '2024-08-29 12:06:46',
            ),
            38 => 
            array (
                'id' => 39,
                'special_id' => 50,
                'administrative_id' => 177,
                'salary_id' => 11,
                'created_at' => '2024-08-29 12:07:04',
                'updated_at' => '2024-08-29 12:07:04',
            ),
            39 => 
            array (
                'id' => 40,
                'special_id' => 51,
                'administrative_id' => 177,
                'salary_id' => 11,
                'created_at' => '2024-08-29 12:07:19',
                'updated_at' => '2024-08-29 12:07:19',
            ),
            40 => 
            array (
                'id' => 41,
                'special_id' => 52,
                'administrative_id' => 177,
                'salary_id' => 11,
                'created_at' => '2024-08-29 12:07:33',
                'updated_at' => '2024-08-29 12:07:33',
            ),
            41 => 
            array (
                'id' => 42,
                'special_id' => NULL,
                'administrative_id' => 178,
                'salary_id' => 11,
                'created_at' => '2024-08-29 12:07:51',
                'updated_at' => '2024-08-29 12:07:51',
            ),
            42 => 
            array (
                'id' => 43,
                'special_id' => 53,
                'administrative_id' => 179,
                'salary_id' => 12,
                'created_at' => '2024-08-29 12:08:10',
                'updated_at' => '2024-08-29 12:08:10',
            ),
            43 => 
            array (
                'id' => 44,
                'special_id' => 54,
                'administrative_id' => 179,
                'salary_id' => 12,
                'created_at' => '2024-08-29 12:08:25',
                'updated_at' => '2024-08-29 12:08:25',
            ),
            44 => 
            array (
                'id' => 45,
                'special_id' => 55,
                'administrative_id' => 179,
                'salary_id' => 12,
                'created_at' => '2024-08-29 12:08:49',
                'updated_at' => '2024-08-29 12:08:49',
            ),
            45 => 
            array (
                'id' => 46,
                'special_id' => NULL,
                'administrative_id' => 180,
                'salary_id' => 12,
                'created_at' => '2024-08-29 12:09:05',
                'updated_at' => '2024-08-29 12:09:05',
            ),
            46 => 
            array (
                'id' => 47,
                'special_id' => 56,
                'administrative_id' => 181,
                'salary_id' => 13,
                'created_at' => '2024-08-29 12:09:26',
                'updated_at' => '2024-08-29 12:09:26',
            ),
            47 => 
            array (
                'id' => 48,
                'special_id' => NULL,
                'administrative_id' => 182,
                'salary_id' => 13,
                'created_at' => '2024-08-29 12:09:49',
                'updated_at' => '2024-08-29 12:09:49',
            ),
            48 => 
            array (
                'id' => 49,
                'special_id' => 57,
                'administrative_id' => 183,
                'salary_id' => 14,
                'created_at' => '2024-08-29 12:10:17',
                'updated_at' => '2024-08-29 12:10:17',
            ),
            49 => 
            array (
                'id' => 50,
                'special_id' => 219,
                'administrative_id' => 183,
                'salary_id' => 14,
                'created_at' => '2024-08-29 12:12:06',
                'updated_at' => '2024-08-29 12:12:06',
            ),
            50 => 
            array (
                'id' => 51,
                'special_id' => 58,
                'administrative_id' => 183,
                'salary_id' => 14,
                'created_at' => '2024-08-29 12:12:27',
                'updated_at' => '2024-08-29 12:12:27',
            ),
            51 => 
            array (
                'id' => 52,
                'special_id' => 59,
                'administrative_id' => 183,
                'salary_id' => 14,
                'created_at' => '2024-08-29 12:12:50',
                'updated_at' => '2024-08-29 12:12:50',
            ),
            52 => 
            array (
                'id' => 53,
                'special_id' => NULL,
                'administrative_id' => 184,
                'salary_id' => 14,
                'created_at' => '2024-08-29 12:13:09',
                'updated_at' => '2024-08-29 12:13:09',
            ),
            53 => 
            array (
                'id' => 54,
                'special_id' => 60,
                'administrative_id' => 185,
                'salary_id' => 15,
                'created_at' => '2024-08-29 12:13:31',
                'updated_at' => '2024-08-29 12:13:31',
            ),
            54 => 
            array (
                'id' => 55,
                'special_id' => 61,
                'administrative_id' => 185,
                'salary_id' => 15,
                'created_at' => '2024-08-29 12:13:52',
                'updated_at' => '2024-08-29 12:13:52',
            ),
            55 => 
            array (
                'id' => 56,
                'special_id' => 62,
                'administrative_id' => 185,
                'salary_id' => 15,
                'created_at' => '2024-08-29 12:14:11',
                'updated_at' => '2024-08-29 12:14:11',
            ),
            56 => 
            array (
                'id' => 57,
                'special_id' => 63,
                'administrative_id' => 185,
                'salary_id' => 15,
                'created_at' => '2024-08-29 12:14:31',
                'updated_at' => '2024-08-29 12:14:31',
            ),
            57 => 
            array (
                'id' => 58,
                'special_id' => 64,
                'administrative_id' => 185,
                'salary_id' => 15,
                'created_at' => '2024-08-29 12:15:09',
                'updated_at' => '2024-08-29 12:15:09',
            ),
            58 => 
            array (
                'id' => 59,
                'special_id' => NULL,
                'administrative_id' => 186,
                'salary_id' => 15,
                'created_at' => '2024-08-29 12:15:32',
                'updated_at' => '2024-08-29 12:15:32',
            ),
            59 => 
            array (
                'id' => 60,
                'special_id' => 65,
                'administrative_id' => 187,
                'salary_id' => 16,
                'created_at' => '2024-08-29 12:15:53',
                'updated_at' => '2024-08-29 12:15:53',
            ),
            60 => 
            array (
                'id' => 61,
                'special_id' => 66,
                'administrative_id' => 187,
                'salary_id' => 16,
                'created_at' => '2024-08-29 12:16:17',
                'updated_at' => '2024-08-29 12:16:17',
            ),
            61 => 
            array (
                'id' => 62,
                'special_id' => 67,
                'administrative_id' => 187,
                'salary_id' => 16,
                'created_at' => '2024-08-29 12:16:38',
                'updated_at' => '2024-08-29 12:16:38',
            ),
            62 => 
            array (
                'id' => 63,
                'special_id' => NULL,
                'administrative_id' => 188,
                'salary_id' => 16,
                'created_at' => '2024-08-29 12:16:54',
                'updated_at' => '2024-08-29 12:16:54',
            ),
            63 => 
            array (
                'id' => 64,
                'special_id' => NULL,
                'administrative_id' => 189,
                'salary_id' => 16,
                'created_at' => '2024-08-29 12:17:15',
                'updated_at' => '2024-08-29 12:17:15',
            ),
            64 => 
            array (
                'id' => 65,
                'special_id' => 68,
                'administrative_id' => 190,
                'salary_id' => 17,
                'created_at' => '2024-08-29 12:17:47',
                'updated_at' => '2024-08-29 12:17:47',
            ),
            65 => 
            array (
                'id' => 66,
                'special_id' => NULL,
                'administrative_id' => 191,
                'salary_id' => 17,
                'created_at' => '2024-08-29 12:18:09',
                'updated_at' => '2024-08-29 12:18:09',
            ),
            66 => 
            array (
                'id' => 67,
                'special_id' => NULL,
                'administrative_id' => 192,
                'salary_id' => 17,
                'created_at' => '2024-08-29 12:18:33',
                'updated_at' => '2024-08-29 12:18:33',
            ),
            67 => 
            array (
                'id' => 68,
                'special_id' => 69,
                'administrative_id' => 193,
                'salary_id' => 18,
                'created_at' => '2024-08-29 12:19:03',
                'updated_at' => '2024-08-29 12:19:03',
            ),
            68 => 
            array (
                'id' => 69,
                'special_id' => 70,
                'administrative_id' => 193,
                'salary_id' => 18,
                'created_at' => '2024-08-29 12:19:22',
                'updated_at' => '2024-08-29 12:19:22',
            ),
            69 => 
            array (
                'id' => 70,
                'special_id' => 71,
                'administrative_id' => 193,
                'salary_id' => 18,
                'created_at' => '2024-08-29 12:19:46',
                'updated_at' => '2024-08-29 12:19:46',
            ),
            70 => 
            array (
                'id' => 71,
                'special_id' => 72,
                'administrative_id' => 193,
                'salary_id' => 18,
                'created_at' => '2024-08-29 12:20:18',
                'updated_at' => '2024-08-29 12:20:18',
            ),
            71 => 
            array (
                'id' => 72,
                'special_id' => 73,
                'administrative_id' => 193,
                'salary_id' => 18,
                'created_at' => '2024-08-29 12:20:54',
                'updated_at' => '2024-08-29 12:20:54',
            ),
            72 => 
            array (
                'id' => 73,
                'special_id' => NULL,
                'administrative_id' => 194,
                'salary_id' => 18,
                'created_at' => '2024-08-29 12:21:07',
                'updated_at' => '2024-08-29 12:21:07',
            ),
            73 => 
            array (
                'id' => 74,
                'special_id' => NULL,
                'administrative_id' => 195,
                'salary_id' => 18,
                'created_at' => '2024-08-29 12:21:22',
                'updated_at' => '2024-08-29 12:21:22',
            ),
            74 => 
            array (
                'id' => 75,
                'special_id' => 74,
                'administrative_id' => 196,
                'salary_id' => 19,
                'created_at' => '2024-08-29 12:21:53',
                'updated_at' => '2024-08-29 12:21:53',
            ),
            75 => 
            array (
                'id' => 76,
                'special_id' => 75,
                'administrative_id' => 196,
                'salary_id' => 19,
                'created_at' => '2024-08-29 12:22:12',
                'updated_at' => '2024-08-29 12:22:12',
            ),
            76 => 
            array (
                'id' => 77,
                'special_id' => NULL,
                'administrative_id' => 197,
                'salary_id' => 19,
                'created_at' => '2024-08-29 12:22:30',
                'updated_at' => '2024-08-29 12:22:30',
            ),
            77 => 
            array (
                'id' => 78,
                'special_id' => NULL,
                'administrative_id' => 198,
                'salary_id' => 19,
                'created_at' => '2024-08-29 12:22:46',
                'updated_at' => '2024-08-29 12:22:46',
            ),
            78 => 
            array (
                'id' => 79,
                'special_id' => 76,
                'administrative_id' => 199,
                'salary_id' => 20,
                'created_at' => '2024-08-29 12:23:06',
                'updated_at' => '2024-08-29 12:23:06',
            ),
            79 => 
            array (
                'id' => 80,
                'special_id' => 77,
                'administrative_id' => 199,
                'salary_id' => 20,
                'created_at' => '2024-08-29 12:23:23',
                'updated_at' => '2024-08-29 12:23:23',
            ),
            80 => 
            array (
                'id' => 81,
                'special_id' => 78,
                'administrative_id' => 199,
                'salary_id' => 20,
                'created_at' => '2024-08-29 12:23:42',
                'updated_at' => '2024-08-29 12:23:42',
            ),
            81 => 
            array (
                'id' => 82,
                'special_id' => 79,
                'administrative_id' => 199,
                'salary_id' => 20,
                'created_at' => '2024-08-29 12:24:05',
                'updated_at' => '2024-08-29 12:24:05',
            ),
            82 => 
            array (
                'id' => 83,
                'special_id' => NULL,
                'administrative_id' => 200,
                'salary_id' => 20,
                'created_at' => '2024-08-29 12:24:27',
                'updated_at' => '2024-08-29 12:24:27',
            ),
            83 => 
            array (
                'id' => 84,
                'special_id' => NULL,
                'administrative_id' => 201,
                'salary_id' => 20,
                'created_at' => '2024-08-29 12:24:39',
                'updated_at' => '2024-08-29 12:24:39',
            ),
            84 => 
            array (
                'id' => 85,
                'special_id' => 80,
                'administrative_id' => 202,
                'salary_id' => 21,
                'created_at' => '2024-08-29 12:24:59',
                'updated_at' => '2024-08-29 12:24:59',
            ),
            85 => 
            array (
                'id' => 86,
                'special_id' => NULL,
                'administrative_id' => 204,
                'salary_id' => 21,
                'created_at' => '2024-08-29 12:25:14',
                'updated_at' => '2024-08-29 12:25:14',
            ),
            86 => 
            array (
                'id' => 87,
                'special_id' => NULL,
                'administrative_id' => 203,
                'salary_id' => 21,
                'created_at' => '2024-08-29 12:25:27',
                'updated_at' => '2024-08-29 12:25:27',
            ),
            87 => 
            array (
                'id' => 88,
                'special_id' => 81,
                'administrative_id' => 205,
                'salary_id' => 22,
                'created_at' => '2024-08-29 12:25:47',
                'updated_at' => '2024-08-29 12:25:47',
            ),
            88 => 
            array (
                'id' => 89,
                'special_id' => 82,
                'administrative_id' => 205,
                'salary_id' => 22,
                'created_at' => '2024-08-29 12:26:21',
                'updated_at' => '2024-08-29 12:26:21',
            ),
            89 => 
            array (
                'id' => 90,
                'special_id' => 83,
                'administrative_id' => 205,
                'salary_id' => 22,
                'created_at' => '2024-08-29 12:26:49',
                'updated_at' => '2024-08-29 12:26:49',
            ),
            90 => 
            array (
                'id' => 91,
                'special_id' => 84,
                'administrative_id' => 205,
                'salary_id' => 22,
                'created_at' => '2024-08-29 12:27:21',
                'updated_at' => '2024-08-29 12:27:21',
            ),
            91 => 
            array (
                'id' => 92,
                'special_id' => 85,
                'administrative_id' => 205,
                'salary_id' => 22,
                'created_at' => '2024-08-29 12:27:51',
                'updated_at' => '2024-08-29 12:27:51',
            ),
            92 => 
            array (
                'id' => 93,
                'special_id' => 86,
                'administrative_id' => 205,
                'salary_id' => 22,
                'created_at' => '2024-08-29 12:28:23',
                'updated_at' => '2024-08-29 12:28:23',
            ),
            93 => 
            array (
                'id' => 94,
                'special_id' => 87,
                'administrative_id' => 205,
                'salary_id' => 22,
                'created_at' => '2024-08-29 12:28:40',
                'updated_at' => '2024-08-29 12:28:40',
            ),
            94 => 
            array (
                'id' => 95,
                'special_id' => NULL,
                'administrative_id' => 206,
                'salary_id' => 22,
                'created_at' => '2024-08-29 12:28:54',
                'updated_at' => '2024-08-29 12:28:54',
            ),
            95 => 
            array (
                'id' => 96,
                'special_id' => NULL,
                'administrative_id' => 207,
                'salary_id' => 22,
                'created_at' => '2024-08-29 12:29:10',
                'updated_at' => '2024-08-29 12:29:10',
            ),
            96 => 
            array (
                'id' => 97,
                'special_id' => 88,
                'administrative_id' => 208,
                'salary_id' => 23,
                'created_at' => '2024-08-29 12:29:43',
                'updated_at' => '2024-08-29 12:29:43',
            ),
            97 => 
            array (
                'id' => 98,
                'special_id' => NULL,
                'administrative_id' => 209,
                'salary_id' => 23,
                'created_at' => '2024-08-29 12:30:01',
                'updated_at' => '2024-08-29 12:30:01',
            ),
            98 => 
            array (
                'id' => 99,
                'special_id' => NULL,
                'administrative_id' => 210,
                'salary_id' => 23,
                'created_at' => '2024-08-29 12:30:15',
                'updated_at' => '2024-08-29 12:30:15',
            ),
            99 => 
            array (
                'id' => 100,
                'special_id' => 89,
                'administrative_id' => 211,
                'salary_id' => 23,
                'created_at' => '2024-08-29 12:30:35',
                'updated_at' => '2024-08-29 12:30:35',
            ),
            100 => 
            array (
                'id' => 101,
                'special_id' => 90,
                'administrative_id' => 212,
                'salary_id' => 24,
                'created_at' => '2024-08-29 12:30:56',
                'updated_at' => '2024-08-29 12:30:56',
            ),
            101 => 
            array (
                'id' => 102,
                'special_id' => 91,
                'administrative_id' => 212,
                'salary_id' => 24,
                'created_at' => '2024-08-29 12:31:18',
                'updated_at' => '2024-08-29 12:31:18',
            ),
            102 => 
            array (
                'id' => 103,
                'special_id' => 92,
                'administrative_id' => 212,
                'salary_id' => 24,
                'created_at' => '2024-08-29 12:31:41',
                'updated_at' => '2024-08-29 12:31:41',
            ),
            103 => 
            array (
                'id' => 104,
                'special_id' => NULL,
                'administrative_id' => 213,
                'salary_id' => 24,
                'created_at' => '2024-08-29 12:31:57',
                'updated_at' => '2024-08-29 12:31:57',
            ),
            104 => 
            array (
                'id' => 105,
                'special_id' => NULL,
                'administrative_id' => 214,
                'salary_id' => 24,
                'created_at' => '2024-08-29 12:32:10',
                'updated_at' => '2024-08-29 12:32:10',
            ),
            105 => 
            array (
                'id' => 106,
                'special_id' => 93,
                'administrative_id' => 215,
                'salary_id' => 24,
                'created_at' => '2024-08-29 12:32:29',
                'updated_at' => '2024-08-29 12:32:29',
            ),
            106 => 
            array (
                'id' => 107,
                'special_id' => 94,
                'administrative_id' => 216,
                'salary_id' => 25,
                'created_at' => '2024-08-29 12:32:39',
                'updated_at' => '2024-08-29 12:32:39',
            ),
            107 => 
            array (
                'id' => 108,
                'special_id' => 95,
                'administrative_id' => 217,
                'salary_id' => 26,
                'created_at' => '2024-08-29 12:33:03',
                'updated_at' => '2024-08-29 12:33:03',
            ),
            108 => 
            array (
                'id' => 109,
                'special_id' => 96,
                'administrative_id' => 218,
                'salary_id' => 27,
                'created_at' => '2024-08-29 12:33:13',
                'updated_at' => '2024-08-29 12:33:13',
            ),
        ));

        
    }
}