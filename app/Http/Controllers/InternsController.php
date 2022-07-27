<?php

namespace App\Http\Controllers;

use App\Models\Assessments;
use App\Models\User;
use Carbon\Carbon;
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
                ->through(fn ($intern) => [
                    'id' => $intern->id,
                    'name' => $intern->name,
                    'slug' => $intern->slug,
                    'email' => $intern->email,
                    'gender' => $intern->gender,
                    'organization' => $this->checkOrg($intern->organization),
                    'phoneNumber' => $intern->phone_number,
                    'programme' => $intern->programme->name,
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
        return Inertia::render('Interns/Show', [
            'intern' => $user->only('name'),
            'assessments' => Assessments::query()
                ->paginate(10)
                ->through(fn ($assessment) => [
                    'name' => $assessment->name,
                    'slug' => $assessment->slug,
                    'type' => $assessment->assessmentType->name,
                ]),
            // 'interns' => $organization->users()
            // ->where('role_id', 4)
            // ->paginate(10)
            // ->withQueryString()
            // ->through(fn ($intern) => [
            //     'id' => $intern->id,
            //     'name' => $intern->name,
            //     'gender' => $intern->gender,
            //     'email' => $intern->email,
            //     'phonenumber' => $intern->phone_number
            // ]),
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
