<?php

namespace App\Services;

use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\This;

class ProductService
{

    public function storeProduct(
        int  $brand_id,
        int  $category_id,
        int  $subcategory_id,
        int $subsubcategory_id,
        string  $product_name_en,
        string  $product_name_hin,
        string  $product_name_ar,
        string  $product_code,
        string  $product_qty,
        string  $product_color_ar,
        string  $product_color_en,
        string  $product_color_hin,
        string  $selling_price,
        string  $discount_price,
        string  $short_descp_en,
        string  $short_descp_ar,
        string  $short_descp_hin,
        string  $long_descp_en,
        string  $long_descp_ar,
        string  $long_descp_hin,
        string  $product_tags_en,
        string  $product_tags_hin,
        string  $product_tags_ar,
        string  $product_size_en,
        string  $product_size_hin,
        string  $product_size_ar,
        string  $product_thambnail,
        string  $hot_deals,
        string  $featured,
        string  $special_offer,
        string  $special_deals,
        int  $status = 1
        // // string  $multi_img


    )
    {



        // $customer = Product::create();
        // $product = Product::create([
        //     'brand_id' => $brand_id,
        //     'category_id' => $category_id,
        //     'subcategory_id' => $subcategory_id,
        //     'subsubcategory_id' => $subsubcategory_id,
        //     'product_name_en' => $product_name_en,
        //     'product_name_hin' => $product_name_hin,
        //     'product_name_ar' => $product_name_ar,
        //     'product_slug_en' =>  strtolower(str_replace(' ', '-', $product_name_en)),
        //     'product_slug_hin' => str_replace(' ', '-', $product_name_hin),
        //     'product_slug_ar' => str_replace(' ', '-', $product_name_ar),
        //     'product_code' => $product_code,

        //     'product_qty' => $product_qty,
        //     'product_tags_en' => $product_tags_en,
        //     'product_tags_hin' => $product_tags_hin,
        //     'product_tags_ar' => $product_tags_ar,
        //     'product_size_en' => $product_size_en,
        //     'product_size_hin' => $product_size_hin,
        //     'product_size_ar' => $product_size_ar,
        //     'product_color_en' => $product_color_en,
        //     'product_color_hin' => $product_color_hin,
        //     'product_color_ar' => $product_color_ar,

        //     'selling_price' => $selling_price,
        //     'discount_price' => $discount_price,
        //     'short_descp_en' => $short_descp_en,
        //     'short_descp_hin' => $short_descp_hin,
        //     'short_descp_ar' => $short_descp_ar,
        //     'long_descp_en' => $long_descp_en,
        //     'long_descp_hin' => $long_descp_hin,
        //     'long_descp_ar' => $long_descp_ar,

        //     'hot_deals' => $hot_deals,
        //     'featured' => $featured,
        //     'special_offer' => $special_offer,
        //     'special_deals' => $special_deals,

        //     'product_thambnail' =>$this->productThumbnail($product_thambnail),
        //     'status' => $status,


        // ]);


        // MultiImg::create([
        //     'product_id' => $product->id,
        //     'photo_name' => $this->productMultiImg($multi_img),
        //     'created_at' => Carbon::now(),
        // ]);


    }



    public   function productThumbnail($image)
    {
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

        return $save_url;
    }


    public   function productMultiImg($images)
    {
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;
        }

        return $uploadPath;
    }
}
