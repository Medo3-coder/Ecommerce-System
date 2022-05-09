<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected  $fillable = [
        'category_id',
        'sub_category_name_en',
        'sub_category_name_hin',
        'sub_category_name_ar',
        'sub_category_slug_en',
        'sub_category_slug_hin',
        'sub_category_slug_ar',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }

    public function sub_sub_category()
    {
        return $this->hasMany(SubSubCategory::class , 'subcategory_id' , 'id');
    }





}
