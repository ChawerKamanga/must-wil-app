<?php

namespace Database\Seeders;

use App\Models\District;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                'name' => 'Northern Region',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Central Region',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Southern Supervisor',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Eastern Region',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]
        ];

        District::insert($regions);
    }
}
