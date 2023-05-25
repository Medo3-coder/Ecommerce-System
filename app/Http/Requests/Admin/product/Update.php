<?php

namespace App\Http\Requests\Admin\product;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'brand_id' => 'nullable',
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'subsubcategory_id' => 'nullable',
            'status' =>'nullable|boolean',
            'name' => 'nullable',
            'code' => 'nullable',
            'qty' => 'nullable',
            'slug' => 'nullable',
            'tags' => 'nullable',
            'size' => 'nullable',
            'color' => 'nullable',
            'selling_price' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
            'short_desc' => 'nullable|max:255',
            'long_desc' => 'nullable|max:600',
            'hot_deals' => 'nullable',
            'featured' => 'nullable',
            'special_offer' => 'nullable',
            'special_deals' => 'nullable',
            'product_thambnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',



        ];
    }
}
