<?php

namespace App\Http\Requests\Admin\product;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'status' =>'required|boolean',
            'name' => 'required',
            'code' => 'required',
            'qty' => 'required',
            'slug' => 'required',
            'tags' => 'required',
            'size' => 'nullable',
            'color' => 'required',
            'selling_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'short_desc' => 'required|max:255',
            'long_desc' => 'required|max:600',
            'hot_deals' => 'nullable',
            'featured' => 'nullable',
            'special_offer' => 'nullable',
            'special_deals' => 'nullable',
            'product_thambnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
