<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\SliderScore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class InternsController extends Controller
{

    private function checkOrg($value)
    {
        return ($value == null) ? 'Not yet Allocated' : $value->name;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Interns/Index', [
            'interns' => User::query()->where('role_id', '=', 4)
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orderBy('name')
                ->paginate(10)
                ->withQueryString()
                ->through(fn($intern) => [
                    'id' => $intern->id,
                    'name' => $intern->name,
                    'slug' => $intern->slug,
                    'email' => $intern->email,
                    'gender' => $intern->gender,
                    'organization' => $this->checkOrg($intern->organization),
                    'phoneNumber' => $intern->phone_number,
                    'programme' => $intern->programme->code,
                    'district' => $intern->district->name,

                ]),
            'filters' => $request->only(['search']),
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $scores = DB::table('slider_scores')
            ->where('student_id', $user->id)
            ->where('evaluation_id', 1)
            ->pluck('scores');
        // ->map(function ($scoreString) {
        //     return SliderScore::calculatePercentage($scoreString);
        // });

        dd($scores);

        // return Inertia::render('Interns/Show', [
        //     'intern' => $user->only('name', 'slug', 'id', 'report_url'),
        //     'presentation_score' => SliderScore::getAveragePercentage($user->id, 1),
        //     'industrial_supervisor_score' => SliderScore::getAveragePercentage($user->id, 2),
        //     'user_evaluation' => $user->evaluations,
        //     'evaluations' => Evaluation::query()
        //         ->paginate(10)
        //         ->through(fn($evaluation) => [
        //             'id' => $evaluation->id,
        //             'name' => $evaluation->name,
        //             'slug' => $evaluation->slug,
        //             'total_weight' => $evaluation->total_weight_percentage,
        //             'type' => $evaluation->assessment->assessmentType->name,
        //         ]),
        // ]);
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