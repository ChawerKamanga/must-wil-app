<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'gender' => $user->gender,
            ],
        ]);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        dd($request->hasFile('profile_pic'));

        if($request->hasFile('profile_pic')){
            // image upload
            $file = $request->file('profile_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->profile_img_name = $filename;
            $user->profile_img_url = '/uploads/profile/' . $filename;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->gender = $request->gender;
            $user->password = Hash::make($request->password);
            $user->update();
    
        }else {
            return Redirect::back()->with('message', 'Something went wrong');
        }

        return Redirect::route('dashboard');
    }
}
