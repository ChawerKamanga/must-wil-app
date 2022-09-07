<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssementRequest;
use App\Models\Assessment;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Evaluations/Create', [
            'assesments' => Assessment::query()
                ->paginate(100)
                ->through(fn ($assessment) => [
                    'id' => $assessment->id,
                    'name' => $assessment->name,
                ]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssementRequest $request)
    {
        $evaluation = new Evaluation();

        

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/documents/', $filename);
            $evaluation->file_name = $filename;
            $evaluation->file_url = '/uploads/documents/' . $filename;

            $evaluation->name = $request->name;
            $evaluation->total_weight_percentage = $request->weight_percentage;
            $evaluation->assessment_id = $request->assesment;
            $evaluation->description = $request->description;
            $evaluation->due_date = $request->due_date;

            $evaluation->save();
        }else {
            $evaluation->name = $request->name;
            $evaluation->total_weight_percentage = $request->weight_percentage;
            $evaluation->assessment_id = $request->assesment;

            $evaluation->save();
        }

        return redirect(route('assessments.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        return Inertia::render('Evaluations/Show', [
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
