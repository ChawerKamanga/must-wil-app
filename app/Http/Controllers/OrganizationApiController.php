<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationApiController extends Controller
{
    public function index()
    {
        return OrganizationResource::collection(Organization::all());
    }
}
