<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userUpdate extends FormRequest
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
        $id = $this->user;
        return [
            'name' => 'required|min:5|max:254|unique:users,name,' . $id,
            'email' => 'required|min:5|max:254|unique:users,email,'. $id,
            'password' => 'max:250'
        ];
    }
}
