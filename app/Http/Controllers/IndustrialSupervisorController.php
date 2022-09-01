<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndustrialSuperVisorRequest;
use App\Models\Organization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class IndustrialSupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('IndustrialSupervisor/Index', [
            'industrialSupervisors' => User::query()->where('role_id', '=', 3)
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orderBy('name')
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($industrialSupervisor) => [
                    'id' => $industrialSupervisor->id,
                    'name' => $industrialSupervisor->name,
                    'slug' => $industrialSupervisor->slug,
                    'email' => $industrialSupervisor->email,
                    'gender' => $industrialSupervisor->gender,
                    'organization' => $industrialSupervisor->organization->name,
                    'phoneNumber' => $industrialSupervisor->phone_number,
                    'createdAt' =>  Carbon::parse($industrialSupervisor->created_at)->format('l jS \of F Y h:i:s A')
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
        return Inertia::render('IndustrialSupervisor/Create', [
            'organizations' => Organization::query()
                ->paginate(20)
                ->through(fn ($organization) => [
                    'id' => $organization->id,
                    'name' => $organization->name,
                ])
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndustrialSuperVisorRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role_id' => 3,
            'password' => Hash::make($request->password),
            'organization_id' => $request->organization_id,
            'gender' => $request->gender
        ]);

        return Redirect::route('industrial-supervisors.index');
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
