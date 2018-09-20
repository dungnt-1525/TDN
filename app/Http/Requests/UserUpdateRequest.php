<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'phone' => 'required|min:10|numeric',
            'confirm_password' => 'max:20|same:password',
            'img_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
