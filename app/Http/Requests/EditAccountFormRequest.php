<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAccountFormRequest extends FormRequest
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
            'id'            => 'required|max:20',
            'account'       => 'required|max:20',
            'email'         => 'required|max:40',
            'password'      => 'required|max:20',
            'description'   => 'max:160',
            'website'       => 'max:40',
        ];
    }
}
