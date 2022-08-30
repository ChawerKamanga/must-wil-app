<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRegisterFirststepRequest;
use App\Http\Requests\StudentRegisterLastStepRequest;
use App\Http\Requests\StudentRegisterSecondStepRequest;
use App\Models\District;
use App\Models\Intrest;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

    public function firstStep(StudentRegisterFirststepRequest $request)
    {
        return to_route('register.create');
    }

    public function secondStep(StudentRegisterSecondStepRequest $request)
    {
        return to_route('register.create');
    }

    public function register(StudentRegisterLastStepRequest $request)
    {
       
        $user = new User();

        if($request->hasFile('profile_pic')){
            // image upload
            $file = $request->file('profile_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->profile_img_name = $filename;
            $user->profile_img_url = '/uploads/profile/' . $filename;

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phone_number');
            $user->next_of_kin = $request->input('next_of_kin');
            $user->reg_number = $request->input('reg_number');
            $user->programme_id = $request->input('program_of_study');
            $user->gender = $request->input('gender');
            $user->district_id = $request->input('district');
            $user->password = Hash::make($request->password);
            $user->role_id = 4;
            $user->save();
    
        }else {
            return Redirect::back()->with('message', 'Something went wrong');
        }
        auth()->attempt($request->only('email', 'password'));

        return Redirect::route('dashboard');


    }
}
