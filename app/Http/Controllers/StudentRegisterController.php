<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentRegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/StudentRegister', [
            'programmes' => Programme::query()
                ->paginate(20)
                ->through(fn ($program) => [
                    'id' => $program->id,
                    'name' => $program->name,
                ]),
        ]);
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

    public function secondStep(Request $request)
    {
        $request->validate([
            'reg_number' => ['required'],
            'profile_pic' => ['required'],
        ]);

        return to_route('register.create');
    }

    public function register()
    {
        
    }
}
