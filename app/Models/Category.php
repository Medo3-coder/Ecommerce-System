<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name_en',
        'category_name_hin',
        'category_name_ar',
        'category_slug_en',
        'category_slug_hin',
        'category_slug_ar',
        'category_icon',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class)->orderBy('sub_category_name_en', 'ASC');
    }


}
