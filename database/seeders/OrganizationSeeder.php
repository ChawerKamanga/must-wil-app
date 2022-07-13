<?php

namespace Database\Seeders;

use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = [
            [
                'name' => 'Mzuzu E-Hub',
                'slug' => 'Mzuzu-E-Hub',
                'district_id' => 1,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'MHub',
                'slug' => 'mhub',
                'district_id' => 3,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'FDH Bank',
                'slug' => 'fdh-bank',
                'district_id' => 2,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'MANEB',
                'slug' => 'maneb',
                'district_id' => 4,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
        ];

        Organization::insert($organizations);
    }
}
