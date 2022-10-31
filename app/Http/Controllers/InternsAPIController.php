<?php

namespace App\Http\Controllers;

use App\Http\Resources\InternResource;
use App\Models\User;
use Illuminate\Http\Request;

class InternsAPIController extends Controller
{
    public function index($pgId)
    {
        $interns = User::where([['role_id', 4], ['programme_id', $pgId]])->get();

        return InternResource::collection($interns);
    }
}
