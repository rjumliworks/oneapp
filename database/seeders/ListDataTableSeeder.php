<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListDataTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_data')->delete();
        
        \DB::table('list_data')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'n/a',
                'type' => 'n/a',
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Single',
                'type' => 'Marital Status',
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Married',
                'type' => 'Marital Status',
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Widowed',
                'type' => 'Marital Status',
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Divorced',
                'type' => 'Marital Status',
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Separated',
                'type' => 'Marital Status',
                'is_active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'A+',
                'type' => 'Blood Type',
                'is_active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'A-',
                'type' => 'Blood Type',
                'is_active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'B+',
                'type' => 'Blood Type',
                'is_active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'B-',
                'type' => 'Blood Type',
                'is_active' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'AB+',
                'type' => 'Blood Type',
                'is_active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'AB-',
                'type' => 'Blood Type',
                'is_active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'O+',
                'type' => 'Blood Type',
                'is_active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'O-',
                'type' => 'Blood Type',
                'is_active' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Plantilla',
                'type' => 'Employment Status',
                'is_active' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Contract of Service',
                'type' => 'Employment Status',
                'is_active' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Job Order',
                'type' => 'Employment Status',
                'is_active' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Laborer I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Utility Worker I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Laboratory Aide I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Clerk',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Driver I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Laborer II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Clerk II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Driver II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Laboratory Aide II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Science Aide',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Agricultural Technician I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Clerk III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Labor Foreman',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Laboratory Technician I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Utility Foreman',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Computer Operator I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Agricultural Technician II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Clerk IV',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Labor General Foreman',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Laboratory Inspector I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Laboratory Technician II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Project Development Assistant',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Project Assistant I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Laboratory Technician II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Computer Operator II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Science Research Assistant',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Laboratory Inspector II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Project Assistant II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Computer Maintenance Technologist I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Computer Programmer I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Data Entry Machine Operator III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Information Officer I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Science Research Analyst',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Project Evaluation Officer I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Project Development Officer I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Computer Operator III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Project Assistant III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'University Research Associate I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Science Research Specialist I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Computer Operator IV',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Project Assistant IV',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'University Research Associate II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Computer Maintenance Technologist II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Computer Programmer II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Information Officer II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Project Evaluation Officer II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Project Development Officer II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Information Systems Analyst II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Science Research Specialist II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'University Researcher I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Computer Maintenance Technologist III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Computer Programmer III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Information Officer III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Project Development Officer III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Project Evaluation Officer III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'University Researcher II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Information Technology Officer I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Senior Science Research Specialist',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Project Officer I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'University Researcher III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Project Administrative Officer V',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Project Technical Officer V',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Project Officer II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Information Officer IV',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Information Technology Officer II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Project Officer III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Project Evaluation Officer IV',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Project Development Officer IV',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Supervising Science Research Specialist',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'University Researcher IV',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Project Officer IV',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'S&T Fellow I',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Chief Science Research Specialist',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Project Officer V',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'University Researcher V',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'S&T Fellow II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'S&T Fellow III',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'S&T Fellow IV',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'S&T Fellow V',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            96 => 
            array (
                'id' => 158,
                'name' => 'Project Laborer I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            97 => 
            array (
                'id' => 159,
                'name' => 'Project Utility Aide I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            98 => 
            array (
                'id' => 160,
                'name' => 'Project Utility Worker I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            99 => 
            array (
                'id' => 161,
                'name' => 'Project Utility Aide II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            100 => 
            array (
                'id' => 162,
                'name' => 'Project Laborer II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            101 => 
            array (
                'id' => 163,
                'name' => 'Project Administrative I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            102 => 
            array (
                'id' => 164,
                'name' => 'Project Technical Aide I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            103 => 
            array (
                'id' => 165,
                'name' => 'Project Administrative Aide II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            104 => 
            array (
                'id' => 166,
                'name' => 'Project Technical Aide II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            105 => 
            array (
                'id' => 167,
                'name' => 'Project Technical Aide III',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            106 => 
            array (
                'id' => 168,
                'name' => 'Project Administrative Aide III',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            107 => 
            array (
                'id' => 169,
                'name' => 'Project Technical Aide IV',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            108 => 
            array (
                'id' => 170,
                'name' => 'Project Administrative Aide IV',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            109 => 
            array (
                'id' => 171,
                'name' => 'Project Technical Aide V',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            110 => 
            array (
                'id' => 172,
                'name' => 'Project Administrative Aide V',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            111 => 
            array (
                'id' => 173,
                'name' => 'Project Technical Aide VI',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            112 => 
            array (
                'id' => 174,
                'name' => 'Project Administrative Aide VI',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            113 => 
            array (
                'id' => 175,
                'name' => 'Project Technical Assistant I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            114 => 
            array (
                'id' => 176,
                'name' => 'Project Administrative Assistant I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            115 => 
            array (
                'id' => 177,
                'name' => 'Project Technical Assistant II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            116 => 
            array (
                'id' => 178,
                'name' => 'Project Administrative Assistant II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            117 => 
            array (
                'id' => 179,
                'name' => 'Project Technical Assistant III',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            118 => 
            array (
                'id' => 180,
                'name' => 'Project Administrative Assistant III',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            119 => 
            array (
                'id' => 181,
                'name' => 'Project Technical Assistant IV',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            120 => 
            array (
                'id' => 182,
                'name' => 'Project Administrative Assistant IV',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            121 => 
            array (
                'id' => 183,
                'name' => 'Project Technical Assistant V',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            122 => 
            array (
                'id' => 184,
                'name' => 'Project Administrative Assistant V',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            123 => 
            array (
                'id' => 185,
                'name' => 'Project Technical Assistant VI',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            124 => 
            array (
                'id' => 186,
                'name' => 'Project Administrative Assistant VI',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            125 => 
            array (
                'id' => 187,
                'name' => 'Project Technical Specialist I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            126 => 
            array (
                'id' => 188,
                'name' => 'Project Administrative Officer I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            127 => 
            array (
                'id' => 189,
                'name' => 'Project Technical Officer I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            128 => 
            array (
                'id' => 190,
                'name' => 'Project Technical Specialist II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            129 => 
            array (
                'id' => 191,
                'name' => 'Project Administrative Officer II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            130 => 
            array (
                'id' => 192,
                'name' => 'Project Technical Officer II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            131 => 
            array (
                'id' => 193,
                'name' => 'Project Technical Specialist III',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            132 => 
            array (
                'id' => 194,
                'name' => 'Project Administrative Officer III',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            133 => 
            array (
                'id' => 195,
                'name' => 'Project Technical Officer III',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            134 => 
            array (
                'id' => 196,
                'name' => 'Project Technical Specialist IV',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            135 => 
            array (
                'id' => 197,
                'name' => 'Project Administrative Officer IV',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            136 => 
            array (
                'id' => 198,
                'name' => 'Project Technical Officer IV',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            137 => 
            array (
                'id' => 199,
                'name' => 'Project Technical Specialist V',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            138 => 
            array (
                'id' => 200,
                'name' => 'Project Administrative Officer V',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            139 => 
            array (
                'id' => 201,
                'name' => 'Project Technical Officer V',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            140 => 
            array (
                'id' => 202,
                'name' => 'Project Technical Specialist VI',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            141 => 
            array (
                'id' => 203,
                'name' => 'Project Administrative Officer VI',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            142 => 
            array (
                'id' => 204,
                'name' => 'Project Technical Officer VI',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            143 => 
            array (
                'id' => 205,
                'name' => 'Project Senior Technical Specialist',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            144 => 
            array (
                'id' => 206,
                'name' => 'Project Senior Administrative Officer I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            145 => 
            array (
                'id' => 207,
                'name' => 'Project Senior Technical Officer I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            146 => 
            array (
                'id' => 208,
                'name' => 'Project Supervising Technical Specialist',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            147 => 
            array (
                'id' => 209,
                'name' => 'Project Supervising Technical Officer',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            148 => 
            array (
                'id' => 210,
                'name' => 'Project Supervising Adminstrative Officer',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            149 => 
            array (
                'id' => 211,
                'name' => 'S&T Fellow I',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            150 => 
            array (
                'id' => 212,
                'name' => 'Project Chief Technical Specialist',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            151 => 
            array (
                'id' => 213,
                'name' => 'Project Chief Technical Officer',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            152 => 
            array (
                'id' => 214,
                'name' => 'Project Chief Administrative Officer',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            153 => 
            array (
                'id' => 215,
                'name' => 'S&T Fellow II',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            154 => 
            array (
                'id' => 216,
                'name' => 'S&T Fellow III',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            155 => 
            array (
                'id' => 217,
                'name' => 'S&T Fellow IV',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            156 => 
            array (
                'id' => 218,
                'name' => 'S&T Fellow V',
                'type' => 'Administrative Order',
                'is_active' => 1,
            ),
            157 => 
            array (
                'id' => 219,
                'name' => 'Information Systems Researcher II',
                'type' => 'Special Order',
                'is_active' => 1,
            ),
            158 => 
            array (
                'id' => 220,
                'name' => 'Roman Catholic',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            159 => 
            array (
                'id' => 221,
                'name' => 'Islam',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            160 => 
            array (
                'id' => 222,
                'name' => 'Iglesia ni Cristo',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            161 => 
            array (
                'id' => 223,
                'name' => 'Philippine Independent Church',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            162 => 
            array (
                'id' => 224,
                'name' => 'Seventh-day Adventist',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            163 => 
            array (
                'id' => 225,
                'name' => 'Bible Baptist Church',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            164 => 
            array (
                'id' => 226,
                'name' => 'United Church of Christ in the Philippines',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            165 => 
            array (
                'id' => 227,
                'name' => 'Jehovah\'s Witnesses',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            166 => 
            array (
                'id' => 228,
                'name' => 'Church of Christ',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            167 => 
            array (
                'id' => 229,
                'name' => 'Other Religious Affiliations',
                'type' => 'Religion',
                'is_active' => 1,
            ),
            168 => 
            array (
                'id' => 230,
                'name' => 'Career Service Professional Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            169 => 
            array (
                'id' => 231,
                'name' => 'Career Service Subprofessional Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            170 => 
            array (
                'id' => 232,
                'name' => 'Career Service Executive Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            171 => 
            array (
                'id' => 233,
                'name' => '',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            172 => 
            array (
                'id' => 234,
                'name' => 'Bar and Board Examination Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            173 => 
            array (
                'id' => 235,
                'name' => 'Barangay Health Worker Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            174 => 
            array (
                'id' => 236,
                'name' => 'Barangay Nutrition Scholar Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            175 => 
            array (
                'id' => 237,
                'name' => 'Barangay Official Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            176 => 
            array (
                'id' => 238,
                'name' => 'Electronic Data Processing Specialist Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            177 => 
            array (
                'id' => 239,
                'name' => 'Foreign School Honor Graduate Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            178 => 
            array (
                'id' => 240,
                'name' => 'Honor Graduate Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            179 => 
            array (
                'id' => 241,
                'name' => 'Sanggunian Member Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            180 => 
            array (
                'id' => 242,
                'name' => 'Scientific and Technological Specialist Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            181 => 
            array (
                'id' => 243,
                'name' => 'Skills Eligibility – Category II',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            182 => 
            array (
                'id' => 244,
                'name' => 'Veteran Preference Rating Eligibility',
                'type' => 'Eligibility',
                'is_active' => 1,
            ),
            183 => 
            array (
                'id' => 245,
                'name' => 'Aeronautical Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            184 => 
            array (
                'id' => 246,
                'name' => 'Agricultural Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            185 => 
            array (
                'id' => 247,
                'name' => 'Agriculturist',
                'type' => 'License',
                'is_active' => 1,
            ),
            186 => 
            array (
                'id' => 248,
                'name' => 'Architect',
                'type' => 'License',
                'is_active' => 1,
            ),
            187 => 
            array (
                'id' => 249,
                'name' => 'Certified Mill Foreman',
                'type' => 'License',
                'is_active' => 1,
            ),
            188 => 
            array (
                'id' => 250,
                'name' => 'Certified Mine Foreman',
                'type' => 'License',
                'is_active' => 1,
            ),
            189 => 
            array (
                'id' => 251,
                'name' => 'Certified Plant Mechanic',
                'type' => 'License',
                'is_active' => 1,
            ),
            190 => 
            array (
                'id' => 252,
            'name' => 'Certified Public Accountant (CPA)',
                'type' => 'License',
                'is_active' => 1,
            ),
            191 => 
            array (
                'id' => 253,
                'name' => 'Certified Quarry Foreman',
                'type' => 'License',
                'is_active' => 1,
            ),
            192 => 
            array (
                'id' => 254,
                'name' => 'Chemical Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            193 => 
            array (
                'id' => 255,
                'name' => 'Chemist',
                'type' => 'License',
                'is_active' => 1,
            ),
            194 => 
            array (
                'id' => 256,
                'name' => 'Civil Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            195 => 
            array (
                'id' => 257,
                'name' => 'Criminologist',
                'type' => 'License',
                'is_active' => 1,
            ),
            196 => 
            array (
                'id' => 258,
                'name' => 'Custom Broker',
                'type' => 'License',
                'is_active' => 1,
            ),
            197 => 
            array (
                'id' => 259,
                'name' => 'Dental Hygienist',
                'type' => 'License',
                'is_active' => 1,
            ),
            198 => 
            array (
                'id' => 260,
                'name' => 'Dental Technologist',
                'type' => 'License',
                'is_active' => 1,
            ),
            199 => 
            array (
                'id' => 261,
                'name' => 'Dentist',
                'type' => 'License',
                'is_active' => 1,
            ),
            200 => 
            array (
                'id' => 262,
                'name' => 'Electronics & Communication Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            201 => 
            array (
                'id' => 263,
                'name' => 'Electronics Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            202 => 
            array (
                'id' => 264,
                'name' => 'Electronics Technician',
                'type' => 'License',
                'is_active' => 1,
            ),
            203 => 
            array (
                'id' => 265,
                'name' => 'Environmental Planner',
                'type' => 'License',
                'is_active' => 1,
            ),
            204 => 
            array (
                'id' => 266,
                'name' => 'Fisheries Technologist',
                'type' => 'License',
                'is_active' => 1,
            ),
            205 => 
            array (
                'id' => 267,
                'name' => 'Forester',
                'type' => 'License',
                'is_active' => 1,
            ),
            206 => 
            array (
                'id' => 268,
                'name' => 'Geodetic Aide',
                'type' => 'License',
                'is_active' => 1,
            ),
            207 => 
            array (
                'id' => 269,
                'name' => 'Geodetic Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            208 => 
            array (
                'id' => 270,
                'name' => 'Geologist',
                'type' => 'License',
                'is_active' => 1,
            ),
            209 => 
            array (
                'id' => 271,
                'name' => 'Guidance Counsellor',
                'type' => 'License',
                'is_active' => 1,
            ),
            210 => 
            array (
                'id' => 272,
                'name' => 'Interior Design',
                'type' => 'License',
                'is_active' => 1,
            ),
            211 => 
            array (
                'id' => 273,
                'name' => 'Landscape Architect',
                'type' => 'License',
                'is_active' => 1,
            ),
            212 => 
            array (
                'id' => 274,
                'name' => 'Librarian',
                'type' => 'License',
                'is_active' => 1,
            ),
            213 => 
            array (
                'id' => 275,
                'name' => 'Master Plumber',
                'type' => 'License',
                'is_active' => 1,
            ),
            214 => 
            array (
                'id' => 276,
                'name' => 'Mechanical Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            215 => 
            array (
                'id' => 277,
                'name' => 'Mechanical Plant Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            216 => 
            array (
                'id' => 278,
                'name' => 'Med. Lab. Tech',
                'type' => 'License',
                'is_active' => 1,
            ),
            217 => 
            array (
                'id' => 279,
                'name' => 'Medical Technologist',
                'type' => 'License',
                'is_active' => 1,
            ),
            218 => 
            array (
                'id' => 280,
                'name' => 'Metallurgical Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            219 => 
            array (
                'id' => 281,
                'name' => 'Metallurgical Plant Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            220 => 
            array (
                'id' => 282,
            'name' => 'Midwife (New)',
                'type' => 'License',
                'is_active' => 1,
            ),
            221 => 
            array (
                'id' => 283,
                'name' => 'Mining Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            222 => 
            array (
                'id' => 284,
                'name' => 'Naval Architect',
                'type' => 'License',
                'is_active' => 1,
            ),
            223 => 
            array (
                'id' => 285,
                'name' => 'Nurse',
                'type' => 'License',
                'is_active' => 1,
            ),
            224 => 
            array (
                'id' => 286,
                'name' => 'Nutritionist-Dietitian',
                'type' => 'License',
                'is_active' => 1,
            ),
            225 => 
            array (
                'id' => 287,
                'name' => 'Occupational Therapy',
                'type' => 'License',
                'is_active' => 1,
            ),
            226 => 
            array (
                'id' => 288,
                'name' => 'Occupational Therapy Technician',
                'type' => 'License',
                'is_active' => 1,
            ),
            227 => 
            array (
                'id' => 289,
                'name' => 'Optometrist',
                'type' => 'License',
                'is_active' => 1,
            ),
            228 => 
            array (
                'id' => 290,
                'name' => 'Pharmacist',
                'type' => 'License',
                'is_active' => 1,
            ),
            229 => 
            array (
                'id' => 291,
                'name' => 'Physical Therapy',
                'type' => 'License',
                'is_active' => 1,
            ),
            230 => 
            array (
                'id' => 292,
                'name' => 'Physical Therapy Technician',
                'type' => 'License',
                'is_active' => 1,
            ),
            231 => 
            array (
                'id' => 293,
                'name' => 'Physician',
                'type' => 'License',
                'is_active' => 1,
            ),
            232 => 
            array (
                'id' => 294,
                'name' => 'Professional Electrical Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            233 => 
            array (
                'id' => 295,
            'name' => 'Professional Electronics Engineer (PECE)',
                'type' => 'License',
                'is_active' => 1,
            ),
            234 => 
            array (
                'id' => 296,
                'name' => 'Professional Mechanical Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            235 => 
            array (
                'id' => 297,
                'name' => 'Professional Teacher',
                'type' => 'License',
                'is_active' => 1,
            ),
            236 => 
            array (
                'id' => 298,
                'name' => 'Radiologic Technologist',
                'type' => 'License',
                'is_active' => 1,
            ),
            237 => 
            array (
                'id' => 299,
                'name' => 'Real Estate Appraiser',
                'type' => 'License',
                'is_active' => 1,
            ),
            238 => 
            array (
                'id' => 300,
                'name' => 'Real Estate Broker',
                'type' => 'License',
                'is_active' => 1,
            ),
            239 => 
            array (
                'id' => 301,
                'name' => 'Real Estate Consultant',
                'type' => 'License',
                'is_active' => 1,
            ),
            240 => 
            array (
                'id' => 302,
                'name' => 'Registered Electrical Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            241 => 
            array (
                'id' => 303,
                'name' => 'Registered Master Electrician',
                'type' => 'License',
                'is_active' => 1,
            ),
            242 => 
            array (
                'id' => 304,
                'name' => 'Sanitary Engineer',
                'type' => 'License',
                'is_active' => 1,
            ),
            243 => 
            array (
                'id' => 305,
                'name' => 'Social Worker',
                'type' => 'License',
                'is_active' => 1,
            ),
            244 => 
            array (
                'id' => 306,
                'name' => 'Sugar Technician',
                'type' => 'License',
                'is_active' => 1,
            ),
            245 => 
            array (
                'id' => 307,
                'name' => 'Veterinarian',
                'type' => 'License',
                'is_active' => 1,
            ),
            246 => 
            array (
                'id' => 308,
                'name' => 'X-Ray Technologist',
                'type' => 'License',
                'is_active' => 1,
            ),
            247 => 
            array (
                'id' => 309,
                'name' => 'Eligibility',
                'type' => 'Type',
                'is_active' => 1,
            ),
            248 => 
            array (
                'id' => 310,
                'name' => 'License',
                'type' => 'Type',
                'is_active' => 1,
            ),
            249 => 
            array (
                'id' => 311,
                'name' => 'Doctorate Degree',
                'type' => 'Level',
                'is_active' => 1,
            ),
            250 => 
            array (
                'id' => 312,
                'name' => 'Master’s Degree',
                'type' => 'Level',
                'is_active' => 1,
            ),
            251 => 
            array (
                'id' => 313,
                'name' => 'Bachelor’s Degree',
                'type' => 'Level',
                'is_active' => 1,
            ),
            252 => 
            array (
                'id' => 314,
                'name' => 'Associate Degree ',
                'type' => 'Level',
                'is_active' => 1,
            ),
            253 => 
            array (
                'id' => 315,
                'name' => 'Senior High School',
                'type' => 'Level',
                'is_active' => 1,
            ),
            254 => 
            array (
                'id' => 316,
                'name' => 'Junior High School',
                'type' => 'Level',
                'is_active' => 1,
            ),
            255 => 
            array (
                'id' => 317,
                'name' => 'Others',
                'type' => 'Level',
                'is_active' => 1,
            ),
            256 => 
            array (
                'id' => 318,
                'name' => 'Letter',
                'type' => 'Document Type',
                'is_active' => 1,
            ),
            257 => 
            array (
                'id' => 319,
                'name' => 'Announcement',
                'type' => 'Document Type',
                'is_active' => 1,
            ),
            258 => 
            array (
                'id' => 320,
                'name' => 'Notice Of Meeting',
                'type' => 'Document Type',
                'is_active' => 1,
            ),
            259 => 
            array (
                'id' => 321,
                'name' => 'Memorandum of Agreement',
                'type' => 'Document Type',
                'is_active' => 1,
            ),
            260 => 
            array (
                'id' => 322,
                'name' => 'Administrative Order',
                'type' => 'Document Type',
                'is_active' => 1,
            ),
            261 => 
            array (
                'id' => 323,
                'name' => 'Special Order',
                'type' => 'Document Type',
                'is_active' => 1,
            ),
            262 => 
            array (
                'id' => 324,
                'name' => 'Minutes Of Meeting',
                'type' => 'Document Type',
                'is_active' => 1,
            ),
            263 => 
            array (
                'id' => 325,
                'name' => 'Publication',
                'type' => 'Document Type',
                'is_active' => 1,
            ),
            264 => 
            array (
                'id' => 326,
                'name' => 'Please Rush',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            265 => 
            array (
                'id' => 327,
                'name' => 'Please Attend',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            266 => 
            array (
                'id' => 328,
                'name' => 'Please Draft Reply/memo/letter',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            267 => 
            array (
                'id' => 329,
                'name' => 'Please Acknowledge Receipt',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            268 => 
            array (
                'id' => 330,
                'name' => 'Please Discuss With Me',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            269 => 
            array (
                'id' => 331,
                'name' => 'Please Calendar',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            270 => 
            array (
                'id' => 332,
                'name' => 'Please Follow Up',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            271 => 
            array (
                'id' => 333,
                'name' => 'Please Act On This',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            272 => 
            array (
                'id' => 334,
                'name' => 'Please Post',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            273 => 
            array (
                'id' => 335,
                'name' => 'Please Give Me Feedback',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            274 => 
            array (
                'id' => 336,
                'name' => 'Please File',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            275 => 
            array (
                'id' => 337,
                'name' => 'For Your Information/study/reference',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            276 => 
            array (
                'id' => 338,
                'name' => 'For Your Comments',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
            277 => 
            array (
                'id' => 339,
                'name' => 'For Your Initials/signature',
                'type' => 'Document Action',
                'is_active' => 1,
            ),
        ));

        
    }
}