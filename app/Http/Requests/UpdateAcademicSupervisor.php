<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UpdateAcademicSupervisor extends FormRequest
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
            'name' => ['required', 'max:100'],
            'email' => ['required', 'max:50', 'email'],
            'phone_number' => ['required', 'max:20'],
            'gender' => ['required', 'max:1'],
            'role_id' => ['required', 'numeric', 'min:1', 'max:4'],
            'password' => ['required', Rules\Password::defaults()]
        ];
    }
}
