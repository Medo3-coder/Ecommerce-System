<?php

namespace App\Http\Requests\Admin\categories;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name.ar'                  => 'required|max:191',
            'name.en'                  => 'required|max:191',
            'parent_id'                => 'nullable|exists:categories,id',
            'image'                    => ['nullable','image'],
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
