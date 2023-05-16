<?php

namespace App\Http\Requests\Admin\brand;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name'  => 'required|max:191',
            'slug'  => 'required|max:191',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'category_name_en.required'=> 'Input Category English Name',
    //         'category_name_hin.required'=> 'Input Category Hindi Name',
    //         'category_name_ar.required'=> 'Input Category Arabic Name',
    //     ];
    // }
}
