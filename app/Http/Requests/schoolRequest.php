<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class schoolRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|min:5|max:254',
            'schoolmail' => 'required|email',
            'password' => 'required|confirmed|min:8|max:250',
            'username' => 'required|min:1|max:254|unique:users,name',
            'email' => 'required|min:1|max:254|unique:users',
        ];
    }

}
