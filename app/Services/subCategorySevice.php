<?php

namespace App\Services;

use App\Models\SubCategory;

class subCategorySevice
{
    public function storeSubCategory(
        string $sub_category_name_en,
        string $sub_category_name_hin,
        string $sub_category_name_ar,
        int $category_id

    ){
        SubCategory::create([
            'category_id' =>$category_id,
            'sub_category_name_en' => $sub_category_name_en,
            'sub_category_name_hin' => $sub_category_name_hin,
            'sub_category_name_ar' => $sub_category_name_ar,
            'sub_category_slug_en' => strtolower(str_replace(' ', '-', $sub_category_name_en)),
            'sub_category_slug_hin' => str_replace(' ', '-', $sub_category_name_hin),
            'sub_category_slug_ar' => str_replace(' ', '-', $sub_category_name_ar),
        ]);
    }


    public function updateSubCategory(
        $id,
        string $sub_category_name_en,
        string $sub_category_name_hin,
        string $sub_category_name_ar,
        int $category_id



    ) {

        $category = SubCategory::findOrFail($id)->update([
            'sub_category_name_en' => $sub_category_name_en,
            'sub_category_name_hin' => $sub_category_name_hin,
            'sub_category_name_ar' => $sub_category_name_ar,
            'category_id' => $category_id,
            'category_slug_en' => strtolower(str_replace(' ', '-', $sub_category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $sub_category_name_hin),
            'category_slug_ar' => str_replace(' ', '-', $sub_category_name_ar),

        ]);
    }
}
