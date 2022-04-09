<?php

namespace App\Http\Requests\Admin\category;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
            'category_name_en'=> 'required|max:25',
            'category_name_hin'=> 'required|max:25',
            'category_name_ar'=> 'required|max:25',
            'category_icon'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_name_en.required'=> 'Input Category English Name',
            'category_name_hin.required'=> 'Input Category Hindi Name',
            'category_name_ar.required'=> 'Input Category Arabic Name',
        ];
    }
}
