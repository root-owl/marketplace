<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'given_name' => 'bail|required|string|min:1|max:50',
            'family_name' => 'bail|required|string|min:1|max:50',
            'email' => 'bail|required|email|min:5|max:120|unique:users',
            'password' => 'bail|required|string|min:8|max:16|confirmed'
        ];
    }
}
