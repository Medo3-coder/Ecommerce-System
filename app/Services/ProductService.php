<?php

namespace App\Services;

use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\This;

class ProductService
{

    public function storeProduct(array $data)
    {
        $images = $data['product_thambnail'];
        $data['product_slug_en'] = strtolower(str_replace(' ', '-', $data['product_name_en']));
        $data['product_slug_hin'] = str_replace(' ', '-', $data['product_name_hin']);
        $data['product_slug_ar'] = str_replace(' ', '-', $data['product_name_ar']);
        $data['product_thambnail'] = $this->productThumbnail($images);

        $data['status'] = 1;

        $product = Product::create($data);

        $images = $this->productMultiImg($data['multi_img']);
        foreach ($images  as $image) {
            MultiImg::create([
                'product_id' => $product->id,
                'photo_name' => $image,
            ]);
        }


        return $product;
    }


    public function productDataUpdate(array $data, $product_id)
    {
        $data['id'] = $product_id;
        $data['product_slug_en'] = strtolower(str_replace(' ', '-', $data['product_name_en']));
        $data['product_slug_hin'] = str_replace(' ', '-', $data['product_name_hin']);
        $data['product_slug_ar'] = str_replace(' ', '-', $data['product_name_ar']);
        $data['status'] = 1;

        $product = Product::find($data['id']);
        $product->update($data);

        // dd($product);
        return $product;
    }



    public  function productThumbnail($image)
    {
        return FileService::thumbnail("upload/products/thambnail/", $image);
    }


    public  function productMultiImg($images)
    {
        return FileService::multiImage("upload/products/multi-Image/", $images);
    }


    public  function productColorSelect($product)
    {
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_ar = $product->product_color_ar;
        $product_color_ar = explode(',', $color_ar);

        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',', $color_hin);

        return  [
            'product_color_en' => $product_color_en,
            'product_color_hin' => $product_color_hin,
            'product_color_ar' => $product_color_ar,
        ];
    }

    public function productSizeSelect($product)
    {

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_ar = $product->product_size_ar;
        $product_size_ar = explode(',', $size_ar);

        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',', $size_hin);

        return [
            'product_size_en' => $product_size_en,
            'product_size_hin' => $product_size_hin,
            'product_size_ar' => $product_size_ar,

        ];
    }
}
