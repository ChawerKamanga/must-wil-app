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

    public function firstStep(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'phone_number' => ['required','unique:users'],
            'next_of_kin' => ['required', 'unique:users'],
        ]);
        
        return to_route('register.create');
    }

    public function register()
    {
        
    }
}
