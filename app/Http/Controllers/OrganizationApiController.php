<?php

namespace App\Http\Controllers;

use App\Http\Resources\InternResource;
use App\Http\Resources\InternsAtOrganizationResource;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\SingleOrganizationResource;
use App\Models\Organization;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationApiController extends Controller
{
    public function index()
    {
        return OrganizationResource::collection(Organization::all());
    }


    public function show(Organization $organization)
    {
        return new SingleOrganizationResource($organization);
    }

    public function getUsersByOrganization(User $user)
    {
        // Get the logged-in user's organization ID
        $orgId = $user->organization_id;

        // Get all users belonging to the logged-in user's organization with role_id = 4
        $interns = DB::table('users')
            ->join('programmes', 'users.programme_id', '=', 'programmes.id')
            ->where('users.organization_id', $orgId)
            ->where('users.role_id', 4)
            ->select('users.*', 'programmes.name as program_name')
            ->get();

        return InternsAtOrganizationResource::collection($interns);
    }
}