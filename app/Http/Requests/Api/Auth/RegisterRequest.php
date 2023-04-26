<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {
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
            'name'         => 'required|max:50',
            'country_code' => 'required|numeric|digits_between:2,5',
            'phone'        => 'required|numeric|digits_between:9,10|unique:users,phone,NULL,id,deleted_at,NULL',
            'email'        => 'required|email|unique:users,email,NULL,id,deleted_at,NULL|max:50',
            'password'     => 'required|min:6|max:100',
            'image'        => 'nullable',

        ];
    }
}
