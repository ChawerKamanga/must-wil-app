<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class StoreIndustrialSuperVisorRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users'],
            'phone_number' => ['required', 'max:15', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'gender' => ['required'],
            'organization_id' => ['required'],

        ];
    }
}
