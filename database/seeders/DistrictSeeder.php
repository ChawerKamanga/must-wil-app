<?php

namespace Database\Seeders;

use App\Models\District;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $districts = [
            [
                'name' => 'Mzuzu',
                'region_id' => 1,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Blantyre',
                'region_id' => 3,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Lilongwe',
                'region_id' => 2,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Zomba',
                'region_id' => 4,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
        ];

        District::insert($districts);
    }
}
