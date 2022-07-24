<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicSupRequest;
use App\Http\Requests\UpdateAcademicSupervisor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class AcademicSupervisorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('AcademicSupervisor/Index', [
            'academicSupervisors' => User::query()->where('role_id', 2)
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orderBy('name')
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($academicSupervisor) => [
                    'id' => $academicSupervisor->id,
                    'name' => $academicSupervisor->name,
                    'slug' => $academicSupervisor->slug,
                    'email' => $academicSupervisor->email,
                    'gender' => $academicSupervisor->gender,
                    'phoneNumber' => $academicSupervisor->phone_number,
                    'createdAt' =>  Carbon::parse($academicSupervisor->created_at)->format('l jS \of F Y h:i:s A')
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
        return Inertia::render('AcademicSupervisor/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcademicSupRequest $request)
    {
        User::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role_id' => $request->role_id,
            'gender' => $request->gender,
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('academic-supervisors.create'))
            ->with('message',  'Academic Supervisors added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $academicSupervisor = User::where('slug', $slug)->first();
        return Inertia::render('AcademicSupervisor/Edit', [
            'academicSupervisor' => [
                'id' => $academicSupervisor->id,
                'name' => $academicSupervisor->name,
                'email' => $academicSupervisor->email,
                'phone_number' => $academicSupervisor->phone_number,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcademicSupervisor $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name'        => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role_id' => $request->role_id,
            'gender' => $request->gender,
            'password' => Hash::make($request->password)
        ]);
        

        return redirect(route('academic-supervisors.index'))
            ->with('message',  'Academic Supervisor updated successfully');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect(route('academic-supervisors.index'))
            ->with('message',  'Academic Supervisors deleted successfully');        
    }
}
