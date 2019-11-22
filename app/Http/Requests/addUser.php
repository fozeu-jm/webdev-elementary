<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addUser extends FormRequest
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
            'name' => 'required|min:1|max:254',
            'password' => 'required|confirmed|max:250',
            'email' => 'required|min:1|max:254|unique:users',
            'role' => 'required'
        ];
    }
}
