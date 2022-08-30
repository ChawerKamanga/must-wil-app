<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegisterFirststepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'unique:users', 'email', 'regex:/(.*)@must.ac\.mw/i', 'max:255'],
            'phone_number' => ['required', 'unique:users'],
            'next_of_kin' => ['required'],
        ];
    }
}
