<?php

namespace App\Services;

use App\Models\MultiImg;
use App\Models\Product;

class ProductService {

    public function storeProduct(array $data) {
        $images                    = $data['product_thambnail'];
        $data['product_slug_en']   = strtolower(str_replace(' ', '-', $data['product_name_en']));
        $data['product_slug_hin']  = str_replace(' ', '-', $data['product_name_hin']);
        $data['product_slug_ar']   = str_replace(' ', '-', $data['product_name_ar']);
        $data['product_thambnail'] = $this->productThumbnail($images);

        $data['status'] = 1;

        $product = Product::create($data);

        $images = $this->productMultiImg($data['multi_img']);
        foreach ($images as $image) {
            MultiImg::create([
                'product_id' => $product->id,
                'photo_name' => $image,
            ]);
        }

        return $product;
    }

    public function productDataUpdate(array $data, $product_id) {
        $data['id']               = $product_id;
        $data['product_slug_en']  = strtolower(str_replace(' ', '-', $data['product_name_en']));
        $data['product_slug_hin'] = str_replace(' ', '-', $data['product_name_hin']);
        $data['product_slug_ar']  = str_replace(' ', '-', $data['product_name_ar']);
        $data['status']           = 1;

        $product = Product::find($data['id']);
        $product->update($data);

        // dd($product);
        return $product;
    }

    public function productThumbnail($image) {
        return FileService::thumbnail("upload/products/thambnail/", $image);
    }

    public function productMultiImg($images) {
        return FileService::multiImage("upload/products/multi-Image/", $images);
    }

    public function productColorSelect($product) {
        $productColor = $product->color;
        $color        = explode(',', $productColor);
        return ['colors' => $color];
    }

    public function productSizeSelect($product) {
        $productSize = $product->size;
        $size        = explode(',', $productSize);
        return ['sizes' => $size];
    }
}
