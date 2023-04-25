<?php

namespace App\Http\Controllers;

use App\Http\Resources\InternResource;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\SingleOrganizationResource;
use App\Models\Organization;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

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
        $interns = User::where('organization_id', $orgId)->where('role_id', 4)->get();

        // return $interns;

        // Return the users as JSON data
        return InternResource::collection($interns);
    }
}