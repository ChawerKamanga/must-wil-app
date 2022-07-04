<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'name' => 'Chawer Kamanga',
            'email' => 'chawerkamanga@gmail.com',
            'gender' => 'M',
            'role_id' => 1,
            'password' => Hash::make('abcd1234.'),
        ]);
    }
}