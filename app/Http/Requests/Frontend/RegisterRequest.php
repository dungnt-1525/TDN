<?php

namespace App\Http\Requests\Frontend;

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
            'first_name' => 'bail|required|max:255',
            'last_name' => 'bail|required|max:255',
            'phone' => 'required|min:10',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'max:255',
            'birthday' => 'max:30',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|min:6|max:20|same:password',
            
        ];
    }
}
