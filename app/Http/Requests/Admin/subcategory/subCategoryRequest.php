<?php

namespace App\Http\Requests\admin\subcategory;

use Illuminate\Foundation\Http\FormRequest;

class subCategoryRequest extends FormRequest
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
            'sub_category_name_en' => 'required|max:225',
            'sub_category_name_hin' => 'required|max:225',
            'sub_category_name_ar' => 'required|max:225',
            'category_id' => 'required',


        ];
    }


    public function messages()
    {
        return [

            'category_name_en.required' => 'Input SubCategory English Name',
            'category_name_hin.required' => 'Input SubCategory Hindi Name',
            'category_name_ar.required' => 'Input SubCategory Arabic Name',
            'category_id.required' => 'Please select a Category',
        ];
    }
}
