<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizarionRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\District;
use App\Models\Organization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Organization/Index', [
            'organizations' => Organization::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orderBy('name')
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($organization) => [
                    'id' => $organization->id,
                    'name' => $organization->name,
                    'slug' => $organization->slug,
                    'img_url' => $organization->img_url,
                    'district' => $organization->district->name,
                    'supervisor' => $organization->users()->get()->map->only('id', 'name', 'role_id'),
                    'starting_date' =>  Carbon::parse($organization->starting_date)->format('l jS \of F Y h:i:s A')
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
        return Inertia::render('Organization/Create', [
            'districts' => District::query()
                ->paginate(100)
                ->through(fn ($district) => [
                    'id' => $district->id,
                    'name' => $district->name,
                ]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizarionRequest $request)
    {
        $organization = new Organization();

        if ($request->hasFile('organization_pic')) {
            $file = $request->file('organization_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/org-logos/', $filename);
            $organization->img_name = $filename;
            $organization->img_url = '/uploads/org-logos/' . $filename;

            $organization->name = $request->input('name');
            $organization->starting_date = $request->input('starting_date');
            $organization->district_id = $request->input('district');
            $organization->description = $request->input('description');

            $organization->save();
        }

        return Redirect::route('organizations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return Inertia::render('Organization/Show', [
            'organization' => $organization->only('name'),
            'interns' => $organization->users()
                ->where('role_id', 4)
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($intern) => [
                    'id' => $intern->id,
                    'name' => $intern->name,
                    'gender' => $intern->gender,
                    'email' => $intern->email,
                    'phonenumber' => $intern->phone_number
                ]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return Inertia::render('Organization/Edit', [
            'districts' => District::query()
                ->paginate(100)
                ->through(fn ($district) => [
                    'id' => $district->id,
                    'name' => $district->name,
                ]),
            'organization' => [
                'id' => $organization->id,
                'name' => $organization->name,
                'slug' => $organization->slug,
                'starting_date' => $organization->starting_date,
                'district_id' => $organization->district,
                'description' => $organization->description,
            ],
            'supervisor' => $organization->users()->get()->map->only('id', 'name'),
            'districts' => District::query()
                ->paginate(100)
                ->through(fn ($district) => [
                    'id' => $district->id,
                    'name' => $district->name,
                ]),
            'interns' => User::query()
                ->where([
                    ['role_id', 4],
                    ['is_allocated', 0],
                    ['district_id', $organization->district_id],
                ])->orderBy('name')
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($intern) => [
                    'id' => $intern->id,
                    'name' => $intern->name,
                ]),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrganizarionRequest $request, Organization $organization)
    {
        if ($request->hasFile('organization_pic')) {
            $file = $request->file('organization_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/org-logos/', $filename);
            $organization->img_name = $filename;
            $organization->img_url = '/uploads/org-logos/' . $filename;

            $organization->name = $request->input('name');
            $organization->starting_date = $request->input('starting_date');
            $organization->district_id = $request->input('district');
            $organization->description = $request->input('description');

            $organization->update();
        }else {
            $organization->update([
                'name' => $request->name,
                'starting_date' => $request->starting_date,
                'district_id' => $request->district,
                'description' => $request->description
            ]);

            $intern = User::find($request->intern_id);
            $intern->organization_id = $organization->id;
            $intern->is_allocated = 1;
            $intern->update();
        }

        return Redirect::route('organizations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organization = Organization::findOrFail($id);

        $organization->delete();

        return redirect()->back();
    }
}
