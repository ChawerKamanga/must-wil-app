<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Intrest;
use App\Models\Programme;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentRegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/StudentRegister', [
            'programmes' => Programme::query()
                ->paginate(100)
                ->through(fn ($program) => [
                    'id' => $program->id,
                    'name' => $program->name,
                ]),
            'interests' => Intrest::query()
                ->paginate(100)
                ->through(fn ($intrest) => [
                    'id' => $intrest->id,
                    'name' => $intrest->name,
                ]),
                'districts' => District::query()
                ->paginate(100)
                ->through(fn ($district) => [
                    'id' => $district->id,
                    'name' => $district->name,
                ]),
        ]);
    }

    public function firstStep(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'phone_number' => ['required', 'unique:users'],
            'next_of_kin' => ['required', 'unique:users'],
        ]);

        return to_route('register.create');
    }

    public function secondStep(Request $request)
    {
        $request->validate([
            'reg_number' => ['required', 'unique:users'],
            'profile_pic' => ['required'],
            'program_of_study' => 'required'
        ]);

        return to_route('register.create');
    }

    public function register()
    {
    }
}
