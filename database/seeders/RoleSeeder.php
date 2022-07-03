<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'description' => 'administrator of the app',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Academic Supervisor',
                'description' => 'The lecturer who is the academic supervisor',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Industrial Supervisor',
                'description' => 'The person in charge of the student at the organization',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Intern',
                'description' => 'The student who is working at an organization',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]
        ];

        Role::insert($roles);
    }
}
