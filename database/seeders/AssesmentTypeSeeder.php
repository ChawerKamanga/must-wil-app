<?php

namespace Database\Seeders;

use App\Models\AssesmentType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssesmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assmentTypes = [
            [
                'name' => 'Questionnaire',
                'slug' => 'questionnaire',  
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Document',
                'slug' => 'document',  
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Calendar',
                'slug' => 'calendar',  
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
        ];

        AssesmentType::insert($assmentTypes);
    }
}
