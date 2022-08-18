<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentRegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/StudentRegister');
    }

    public function register()
    {
        
    }
}
