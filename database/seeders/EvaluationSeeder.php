<?php

namespace Database\Seeders;

use App\Models\Evaluations;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evaluations = [
            [
                'name' => 'Assessment of Intern Presentation',
                'slug' => 'assessment-of-intern-presentation',
                'description' => 'This is the Academic & Industrial Supervisor Evaluation of Intern Presentation description.',
                'assessment_id' => 2,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Industrial Supervisor Evaluation of Intern',
                'slug' => 'industrial-supervisor-evaluation-of-intern',
                'description' => 'This is the Industrial Supervisor Assessment of Intern Presentation description.',
                'assessment_id' => 1,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
        ];

        Evaluations::insert($evaluations);
    }
}
