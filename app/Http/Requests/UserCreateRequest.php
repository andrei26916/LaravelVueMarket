<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => ['sometimes', 'string'],
            'first_name' => ['sometimes', 'string'],
            'father_name' => ['sometimes', 'string'],
            'login' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string'],
        ];
    }
}
