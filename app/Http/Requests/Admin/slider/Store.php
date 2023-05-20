<?php

namespace App\Http\Requests\Admin\slider;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required|boolean',
        ];
    }

    public function messages() {
        return [
            'image.required'       => 'please Select one Image',
            'title.required'       => 'Title is required',
            'description.required' => 'Description is required',
            'status.required'      => 'Status is required',
        ];
    }
}
