<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
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
            'brand_name_en'=> 'required|max:25',
            'brand_name_hin'=> 'required|max:25',
            'brand_name_ar'=> 'required|max:25',
            'brand_image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_slug_en'=>'nullable',
            'brand_slug_hin'=>'nullable',
            'brand_slug_ar'=>'nullable',

        ];
    }

     // Bonus: I also like to take care of any custom messages here
     public function messages()
     {
         return [
            'brand_name_en.required'=> 'Input Brand English Name',
            'brand_name_hin.required'=> 'Input Brand Hindi Name',
            'brand_name_ar.required'=> 'Input Brand Arabic Name',
         ];
     }
}
