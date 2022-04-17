<?php

namespace App\Http\Requests\Admin\sub_SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class SubRequest extends FormRequest
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
            'subsubcategory_name_en' => 'required|max:225',
            'subsubcategory_name_hin' => 'required|max:225',
            'subsubcategory_name_ar' => 'required|max:225',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ];

    }

    public function messages()
    {
        return [

            'subsubcategory_name_en.required' => 'Input SubSubCategory English Name',
            'subsubcategory_name_hin.required' => 'Input SubSubCategory Hindi Name',
            'subsubcategory_name_ar.required' => 'Input SubSubCategory Arabic Name',
            'category_id.required' => 'Please select a Category',
            'subcategory_id.required' => 'Please select a SubCategory',
        ];
    }
}
