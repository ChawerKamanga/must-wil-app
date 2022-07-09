<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Roles/Index', [
            'roles' => Role::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($role) => [
                    'id' => $role->id,
                    'name' => $role->name,
                    'slug' => $role->slug,
                    'description' => $role->description,
                    'createdAt' =>  Carbon::parse($role->created_at)->format('l jS \of F Y h:i:s A')
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
        return Inertia::render('Roles/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
       Role::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description
        ]);

        return redirect(route('roles.create'))
            ->with('message',  'Role added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return Inertia::render('Roles/Edit', [
            'role' => [
                'id' => $role->id,
                'name' => $role->name,
                'description' => $role->description,
                'createdAt' => Carbon::parse($role->created_at)->format('l jS \of F Y h:i:s A'),
                'updatedAt' => Carbon::parse($role->updated_at)->format('l jS \of F Y h:i:s A')
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
    public function update(StoreRoleRequest $request, Role $role)
    {
        $role->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description
        ]);

        return redirect(route('roles.index'))
            ->with('message',  'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message', 'Role Deleted Successfully');
    }
}
