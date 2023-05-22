<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model {
    use HasFactory , HasTranslations;
    const IMAGEPATH      = 'products';
    protected $fillable = [
        'brand_id',
        'category_id',
        // 'subcategory_id',
        // 'subsubcategory_id',
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
        // 'product_status',
        'image',
        'created_at',
        'hot_deals',
        'featured',
        'special_offer',
        'special_deals',
        'product_thambnail',
        'status',

    ];
    public $translatable = ['name','slug' , 'tags' , 'size' , 'color' , 'short_desc','long_desc'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function subsubCategory() {
        return $this->belongsTo(SubSubCategory::class, 'subsubcategory_id', 'id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

}
