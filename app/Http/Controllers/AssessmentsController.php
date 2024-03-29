<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Evaluation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AssessmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Assessments/Index', [
            'assessments' => Assessment::query()
                ->paginate(10)
                ->through(fn ($assessment) => [
                    'name' => $assessment->name,
                    'slug' => $assessment->slug,
                    'type' => $assessment->assessmentType->name,
                    'count' => '1',
                ]),
            'evaluations' => Evaluation::query()
                ->paginate(10)
                ->through(fn ($evaluation) => [
                    'name' => $evaluation->name,
                    'file_url' => $evaluation->file_url,
                    'slug' => $evaluation->slug,
                    'description' => $evaluation->description,
                    'type' => $evaluation->assessment->assessmentType->name,
                    'weight' => $evaluation->total_weight_percentage,
                    'dueDate' =>  Carbon::parse($evaluation->due_date)->format('l jS \of F Y h:i:s A')
                ]),
        ]);
    }


    public function showQuestions(Evaluation $evaluation, User $user)
    {
        return Inertia::render('Interns/Assess', [
            'intern' => $user->only('id', 'name'),
            'evaluation' => $evaluation->only('name'),
            'questions' => $evaluation->questions()
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($question) => [
                    'id' => $question->id,
                    'question' => $question->question,
                    'marks' => $question->total_marks,
                ]),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
