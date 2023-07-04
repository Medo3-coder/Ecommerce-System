<?php

namespace App\Http\Requests\Site\Auth;

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
            'name'                  => 'required|max:255',
            'email'                 => 'required|email|max:191|unique:users,email',
            'password'              => 'required|min:6|max:100',
            'phone'                 => 'required|max:11|min:8|unique:users,phone',
            'password_confirmation' => 'required|same:password|min:6|max:100',

        ];
    }
}
