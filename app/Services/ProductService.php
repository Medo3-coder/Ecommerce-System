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

        MultiImg::create([
            'product_id' => $product->id,
            'photo_name' => $this->productMultiImg($data['multi_img']),

        ]);

        return $product;
    }


    public function productDataUpdate(array $data , $product_id)
    {
        $data['id'] = $product_id;
        $data['product_slug_en'] = strtolower(str_replace(' ', '-', $data['product_name_en']));
        $data['product_slug_hin'] = str_replace(' ', '-', $data['product_name_hin']);
        $data['product_slug_ar'] = str_replace(' ', '-', $data['product_name_ar']);
        $data['status'] = 1;

        $product = Product::find($data['id']);
        $product->update($data);

        return $product;
    }



    private function productThumbnail($image)
    {
        return FileService::thumbnail("upload/products/thambnail/", $image);
    }


    private function productMultiImg($images)
    {
        return FileService::multiImage("upload/products/multi-Image/", $images);
    }
}
