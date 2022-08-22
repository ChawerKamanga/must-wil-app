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
            'email' => ['required', 'email', 'unique'],
            'phone_number' => ['required','unique'],
            'next_of_kin' => ['required', 'unique'],
        ]);
        
        return to_route('products.create');
    }

    public function register()
    {
        
    }
}
