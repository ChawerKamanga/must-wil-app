<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegisterSecondStepRequest extends FormRequest
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
            'reg_number' => ['required', 'unique:users', 'regex:/(.*)-(.*)-(.*)/i'],
            'program_of_study' => 'required',
            'profile_pic' => ['required', 'image', 'max:2024'],
        ];
    }
}
