<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewUser extends FormRequest
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
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email address',
            'name' => 'Name',
            'password' => 'Password',
            'confirm' => 'Confirmation Password'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute field cannot be empty',
            'unique' => ':attribute is exist',
            'same' => ':attribute must be the same with Password'
        ];
    }
}
