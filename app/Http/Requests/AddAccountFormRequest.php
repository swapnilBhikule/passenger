<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAccountFormRequest extends FormRequest
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
            'account'       => 'required|max:20',
            'email'         => 'required|max:40',
            'password'      => 'required|max:20',
            'description'   => 'max:160',
            'website'       => 'max:40',
        ];
    }
}