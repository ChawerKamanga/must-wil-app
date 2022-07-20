<?php

namespace Database\Seeders;

use App\Models\Questions;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            // Supervisor Assessment of Intern Presentation questions
            [
                'question' => 'Preparedness & confidence',
                'slug' => 'preparedness-&-confidence',
                'evaluation_id' => 1,
                'total_marks' => 10,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Language & communication (Clarity, conciseness, eye contact)',
                'slug' => 'language-&-communication',
                'evaluation_id' => 1,
                'total_marks' => 10,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Brevity of presentation (done within time limit)',
                'slug' => 'brevity-of-presentation',
                'evaluation_id' => 1,
                'total_marks' => 10,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ], [
                'question' => 'Knowledge & understanding of content about their internship experience',
                'slug' => 'knowledge-&-understanding',
                'evaluation_id' => 1,
                'total_marks' => 20,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Organisation of presentation (Content, Descriptions & Illustrations)',
                'slug' => 'organisation-of-presentation',
                'evaluation_id' => 1,
                'total_marks' => 10,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
        ];

        Questions::insert($questions);
    }
}
