<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProgrammeSeeder extends Seeder
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
                'name' => 'Bsc in Business Information Technology',
                'code' => 'bit',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Bsc in Computer Systems and Security',
                'code' => 'cis',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'BEng in Biomedical Engineering ',
                'code' => 'bme',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'BEng in Chemical Engineering',
                'code' => 'che',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'BEng in Metallurgy and Materials Engineering ',
                'code' => 'mme',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
        ];

        Role::insert($roles);
    }
}
