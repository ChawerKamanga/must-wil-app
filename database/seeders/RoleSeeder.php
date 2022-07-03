<?php

namespace Database\Seeders;

use App\Models\Role;
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
                'description' => 'administrator of the app'
            ],
            [
                'name' => 'Academic Supervisor',
                'description' => 'The lecturer who is the academic supervisor'
            ],
            [
                'name' => 'Industrial Supervisor',
                'description' => 'The person in charge of the student at the organization'
            ],
            [
                'name' => 'Intern',
                'description' => 'The student who is working at an organization'
            ]
        ];

        Role::insert($roles);
    }
}
