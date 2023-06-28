<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model {
    use HasFactory, HasTranslations, UploadTrait;
    const IMAGEPATH     = 'product_thambnail';
    protected $fillable = [
        'brand_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'name',
        'slug',
        'code',
        'qty',
        'tags',
        'size',
        'color',
        'selling_price',
        'discount_price',
        'short_desc',
        'long_desc',
        'image',
        'created_at',
        'hot_deals',
        'featured',
        'special_offer',
        'special_deals',
        'product_thambnail',
        'status',

    ];

    protected $casts = [
        'status' => 'boolean',
    ];
    public $translatable = ['name', 'slug', 'tags', 'size', 'color', 'short_desc', 'long_desc'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }


    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function setProductThambnailAttribute($value) {
        if ($value != null && is_file($value)) {
            isset($this->attributes['product_thambnail']) ? $this->deleteFile($this->attributes['product_thambnail'], 'product_thambnail') : '';
            $this->attributes['product_thambnail'] = $this->uploadAllTyps($value, 'product_thambnail');
        }
    }

    public function getProductThambnailAttribute() {
        if ($this->attributes['product_thambnail']) {
            $image = $this->getImage($this->attributes['product_thambnail'], 'product_thambnail');
        } else {
            $image = $this->productDefaultImage('product_thambnail');

        }

        return $image;
    }

}
