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
           
        ];

        DB::table('users')->insert($users);
    }
}
