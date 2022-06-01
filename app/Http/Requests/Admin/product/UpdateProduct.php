<?php

namespace App\Http\Requests\Admin\product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_hin' => 'required',
            'product_name_ar' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_hin' => 'required',
            'product_tags_ar' => 'required',
            'product_size_en' => 'nullable',
            'product_size_hin' => 'nullable',
            'product_size_ar' => 'nullable',
            'product_color_en' => 'required',
            'product_color_hin' => 'required',
            'product_color_ar' => 'required',
            'selling_price' => 'required|numeric',
            'discount_price' => 'sometimes|nullable|numeric',
            'short_descp_en' => 'required|max:255',
            'short_descp_ar' => 'required|max:255',
            'short_descp_hin' => 'required|max:255',
            'long_descp_en' => 'required|max:600',
            'long_descp_hin' => 'required|max:600',
            'long_descp_ar' => 'required|max:600',
            'hot_deals' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
            'special_offer' => 'nullable|boolean',
            'special_deals' => 'nullable|boolean',



        ];
    }
}
