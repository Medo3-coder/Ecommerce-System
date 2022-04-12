<?php

namespace App\Services;

use App\Models\Category;

class categoryService
{


    public function storeCategory(
        string $category_name_en,
        string $category_name_hin,
        string $category_name_ar,
        string $category_icon
    ) {

        return Category::create([
            'category_name_en' => $category_name_en,
            'category_name_hin' => $category_name_hin,
            'category_name_ar' => $category_name_ar,
            'category_icon' => $category_icon,
            'category_slug_en' => strtolower(str_replace(' ', '-', $category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $category_name_hin),
            'category_slug_ar' => str_replace(' ', '-', $category_name_ar),

        ]);
    }


    public function updateCategory(
        $id,
        string $category_name_en,
        string $category_name_hin,
        string $category_name_ar,
        string $category_icon

    ) {

        $category = Category::findOrFail($id)->update([
            'category_name_en' => $category_name_en,
            'category_name_hin' => $category_name_hin,
            'category_name_ar' => $category_name_ar,
            'category_icon' => $category_icon,
            'category_slug_en' => strtolower(str_replace(' ', '-', $category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $category_name_hin),
            'category_slug_ar' => str_replace(' ', '-', $category_name_ar),

        ]);
    }
}
