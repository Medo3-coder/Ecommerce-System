<?php

namespace App\Services;

use App\Models\MultiImg;
use App\Models\Product;

class ProductService {




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
