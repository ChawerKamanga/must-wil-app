<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\Assessments;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assessments = [
            [
                'name' => 'Industrial Supervisor Evaluation',
                'slug' => 'industrial-supervisor-evaluation',  
                'assesment_type_id' => 1,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Presentations',
                'slug' => 'presentations',  
                'assesment_type_id' => 1,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Report',
                'slug' => 'report',  
                'assesment_type_id' => 2,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Intership Activity Log',
                'slug' => 'intership-activity-log',  
                'assesment_type_id' => 3,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
        ];

        Assessment::insert($assessments);
    }
}
