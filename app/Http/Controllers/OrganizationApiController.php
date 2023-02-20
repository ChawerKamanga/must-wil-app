<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Http\Resources\SingleOrganizationResource;
use App\Models\Organization;
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
}