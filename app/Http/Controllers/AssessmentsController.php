<?php

namespace App\Http\Controllers;

use App\Models\Assessments;
use App\Models\Evaluations;
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
            'assessments' => Assessments::query()
                ->paginate(10)
                ->through(fn ($assessment) => [
                    'name' => $assessment->name,
                    'slug' => $assessment->slug,
                    'type' => $assessment->assessmentType->name,
                    'count' => $assessment->count()
                ]),
            
            'evaluations' => Evaluations::query()
            ->paginate(10)
            ->through(fn ($evaluation) => [
                'name' => $evaluation->name,
                'slug' => $evaluation->slug,
                'description' => $evaluation->description,
                'type' => $evaluation->assessment->assessmentType->name,
                'createdAt' =>  Carbon::parse($evaluation->created_at)->format('l jS \of F Y h:i:s A')
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
