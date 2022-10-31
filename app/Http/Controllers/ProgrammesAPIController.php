<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgrammesResource;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammesAPIController extends Controller
{
    public function index()
    {
        return ProgrammesResource::collection(Programme::all());
    }
}
