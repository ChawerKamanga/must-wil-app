<?php

namespace Database\Seeders;

use App\Models\Programme;
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
        $programmes = [
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
        ];

        Programme::insert($programmes);
    }
}
