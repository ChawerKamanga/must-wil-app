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
            [
                'name' => 'Menard Phiri',
                'slug' => 'menard-phiri',
                'gender' => 'M',
                'email' => 'mphiri@must.ac.mw',
                'phone_number' => '+265 998 000 111',
                'role_id' => 2,
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
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Chawer Kamanga',
                'email' => 'ckamanga@must.ac.mw',
                'slug' => 'chawer-kamanga',
                'phone_number' => '+265 998 400 111',
                'gender' => 'M',
                'role_id' => 1,
                'password' => Hash::make('abcd1234.'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
