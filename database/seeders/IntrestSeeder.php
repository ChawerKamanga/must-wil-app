<?php

namespace Database\Seeders;

use App\Models\Intrest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntrestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interests = [
            [
                'name' => 'Software Development',
            ],
            [
                'name' => 'Data Science',
            ],
            [
                'name' => 'Database Adminstration',
            ],
            [
                'name' => 'Cyber Security',
            ],
            [
                'name' => 'Network Engineering',
            ],
        ];

        Intrest::insert($interests);
    }
}
