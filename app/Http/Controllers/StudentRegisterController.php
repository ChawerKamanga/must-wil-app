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
        return 'I am here';
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique'],
            'phone_number' => ['required','unique'],
            'next_of_kin' => ['required', 'unique'],
        ]);
        
        return to_route('register.create');
    }

    public function register()
    {
        
    }
}
