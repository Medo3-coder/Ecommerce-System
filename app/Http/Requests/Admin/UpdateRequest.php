<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' =>'required|max:25',
            'email' =>'required|email',
           // 'password'=>'required|password',
            'profile_photo_path'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
