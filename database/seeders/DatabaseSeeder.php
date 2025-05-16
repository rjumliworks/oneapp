<?php

namespace Database\Seeders;

use App\Models\UserInformation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ListDataTableSeeder::class);
        $this->call(ListDropdownsTableSeeder::class);

        \DB::table('users')->insert([
            'username' => 'rij-0311',
            'email' => 'kradjumli@gmail.com',
            'password' => bcrypt('123456789'),
            'is_active' => 1,
            'email_verified_at' => '2024-05-15 08:46:33',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('user_profiles')->insert([
            'firstname' => 'Ra-ouf',
            'lastname' => 'Jumli',
            'middlename' => 'Indanan',
            'avatar' => 'avatar.jpg',
            'sex' => 'Male',
            'birthdate' => '1994-03-11',
            'contact_no' => '09171531652',
            'marital_id' => 3,
            'religion_id' => 221,
            'blood_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $this->call(LocationRegionsTableSeeder::class);
        $this->call(LocationProvincesTableSeeder::class);
        $this->call(LocationMunicipalitiesTableSeeder::class);
        $this->call(LocationBarangaysTableSeeder::class);
        $this->call(ListSalariesTableSeeder::class);
        $this->call(ListPositionsTableSeeder::class);
        $this->call(ListUnitsTableSeeder::class);
        $this->call(ListRolesTableSeeder::class);
        $this->call(ListStatusesTableSeeder::class);

        \DB::table('user_organizations')->insert([
            'user_id' => 1,
            'status_id' => 2,
            'division_id' => 4,
            'station_id' => 5,
            'position_id' => 76,
            'type_id' => 16,
            'unit_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \DB::table('user_roles')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \DB::table('user_roles')->insert([
            'user_id' => 1,
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->call(UserCredentialsTableSeeder::class);
        $this->call(UserAcademicsTableSeeder::class);
        $this->call(UserInformationTableSeeder::class);
        $this->call(SurveyQuestionsTableSeeder::class);
        $this->call(ListLeavesTableSeeder::class);
    }
}
