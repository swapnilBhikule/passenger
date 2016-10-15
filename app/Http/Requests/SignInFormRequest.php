<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInFormRequest extends FormRequest
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
            'sign-in-username' => 'required|min:4|max:20',
            'sign-in-password' => 'required|min:6|max:20'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sign-in-username.required' => 'The username is required.',
            'sign-in-username.min'      => 'The username must be at least 4 characters.',
            'sign-in-username.max'      => 'The username may not be greater than 20 characters.',
            'sign-in-password.required' => 'The password is required.',
            'sign-in-password.min'      => 'The password must be at least 4 characters.',
            'sign-in-password.max'      => 'The password may not be greater than 20 characters.',
        ];
    }
}
