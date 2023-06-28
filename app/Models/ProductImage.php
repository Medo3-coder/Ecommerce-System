<?php

namespace App\Models;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {
    use HasFactory, UploadTrait;
    protected $fillable = ['product_id', 'image'];
    const IMAGEPATH     = 'product_image';

    public function getImageAttribute() {
        if ($this->attributes['image']) {
            $image = $this->getImage($this->attributes['image'], 'product_image');
        } else {
            $image = $this->productDefaultMultiImage('product_image');
        }
        return $image;
    }

    public function setImageAttribute($value) {
        if ($value != null && is_file($value)) {
            isset($this->attributes['image']) ? $this->deleteFile($this->attributes['image'], 'product_image') : '';
            $this->attributes['image'] = $this->uploadAllTyps($value, 'product_image');
        }
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
