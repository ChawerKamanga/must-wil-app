<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            // Academic Supervisor
            [
                'name' => 'Menard Phiri',
                'slug' => 'menard-phiri',
                'gender' => 'M',
                'email' => 'mphiri@must.ac.mw',
                'phone_number' => '+265 998 000 111',
                'role_id' => 2,
                'programme_id' => null,
                'year_of_study' => null,
                'reg_number' => null,
                'organization_id' => null,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Allan Tchogwe',
                'slug' => 'allan-tchongwe',
                'email' => 'atchongwe@must.ac.mw',
                'phone_number' => '+265 998 100 111',
                'gender' => 'M',
                'role_id' => 2,
                'programme_id' => null,
                'year_of_study' => null,
                'reg_number' => null,
                'organization_id' => null,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Walu Gondwe',
                'slug' => 'walu-gondwe',
                'email' => 'wgondwe@must.ac.mw',
                'phone_number' => '+265 998 200 111',
                'gender' => 'M',
                'role_id' => 2,
                'programme_id' => null,
                'year_of_study' => null,
                'reg_number' => null,
                'organization_id' => null,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Ralph Tambala',
                'slug' => 'ralpha-tambala',
                'email' => 'rtambala@must.ac.mw',
                'phone_number' => '+265 998 300 111',
                'gender' => 'M',
                'role_id' => 2,
                'programme_id' => null,
                'year_of_study' => null,
                'reg_number' => null,
                'organization_id' => null,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            // Admin
            [
                'name' => 'Chawer Kamanga',
                'email' => 'ckamanga@must.ac.mw',
                'slug' => 'chawer-kamanga',
                'phone_number' => '+265 998 400 111',
                'gender' => 'M',
                'role_id' => 1,
                'programme_id' => null,
                'year_of_study' => null,
                'reg_number' => null,
                'organization_id' => null,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            // Intern
            [
                'name' => 'Chawanangwa Kamanga',
                'email' => 'bit-023-19@must.ac.mw',
                'slug' => 'chawanangwa-kamanga',
                'phone_number' => '+265 998 910 111',
                'gender' => 'M',
                'role_id' => 4,
                'programme_id' => 1,
                'year_of_study' => 3,
                'organization_id' => 3,
                'reg_number' => 'BIT/023/19',
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Bright Kamanga',
                'email' => 'cis-016-19@must.ac.mw',
                'slug' => 'bright-kamanga',
                'phone_number' => '+265 888 780 111',
                'gender' => 'M',
                'role_id' => 4,
                'programme_id' => 2,
                'year_of_study' => 3,
                'organization_id' => 4,
                'reg_number' => 'CIS/016/19',
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Chisomo Chirwa',
                'email' => 'cis-002-19@must.ac.mw',
                'slug' => 'chisomo-chirwa',
                'phone_number' => '+265 898 780 111',
                'gender' => 'F',
                'role_id' => 4,
                'programme_id' => 2,
                'year_of_study' => 3,
                'organization_id' => 1,
                'reg_number' => 'CIS/002/19',
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Grace Kanyasko',
                'email' => 'cis-003-19@must.ac.mw',
                'slug' => 'grace-kanyasko',
                'phone_number' => '+265 988 786 111',
                'gender' => 'F',
                'role_id' => 4,
                'programme_id' => 1,
                'year_of_study' => 3,
                'organization_id' => 3,
                'reg_number' => 'CIS/003/19',
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Shadreck Kasera',
                'email' => 'bit-025-19@must.ac.mw',
                'slug' => 'shadreck-kasera',
                'phone_number' => '+265 998 780 111',
                'gender' => 'M',
                'role_id' => 4,
                'programme_id' => 1,
                'year_of_study' => 3,
                'organization_id' => 2,
                'reg_number' => 'BIT/025/19',
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            // Industrial Supervisor
            [
                'name' => 'John Kamanga',
                'email' => 'jkamanga@fhdbank.com',
                'slug' => 'john-kamanga',
                'phone_number' => '+265 998 800 111',
                'gender' => 'M',
                'role_id' => 3,
                'programme_id' => null,
                'year_of_study' => null,
                'reg_number' => null,
                'organization_id' => 3,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane Banda',
                'email' => 'jbanda@ehub.com',
                'slug' => 'jane-banda',
                'phone_number' => '+265 998 812 111',
                'gender' => 'F',
                'role_id' => 3,
                'programme_id' => null,
                'year_of_study' => null,
                'reg_number' => null,
                'organization_id' => 2,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ], 
            [
                'name' => 'Joseph Phiri',
                'email' => 'jphiri@mzuzuhub.com',
                'slug' => 'joseph-phiri',
                'phone_number' => '+265 888 800 111',
                'gender' => 'M',
                'role_id' => 3,
                'programme_id' => null,
                'year_of_study' => null,
                'reg_number' => null,
                'organization_id' => 1,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ], [
                'name' => 'Tiwonge Nkhoma',
                'email' => 'tnkhoma@maneb.com',
                'slug' => 'tiwonge-nkhoma',
                'phone_number' => '+265 98 800 111',
                'gender' => 'F',
                'role_id' => 3,
                'programme_id' => null,
                'year_of_study' => null,
                'reg_number' => null,
                'organization_id' => 4,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]

        ];

        DB::table('users')->insert($users);
    }
}
