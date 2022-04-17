<?php

namespace App\Services;

use App\Models\SubSubCategory;

class subSubCategoryService
{
    public function storeSubSubCategory(
        string $subsubcategory_name_en,
        string $subsubcategory_name_hin,
        string $subsubcategory_name_ar,
        int $subcategory_id,
        int $category_id

    ) {
        SubSubCategory::create([
            'subcategory_id' => $subcategory_id,
            'category_id' => $category_id,
            'subsubcategory_name_en' => $subsubcategory_name_en,
            'subsubcategory_name_hin' => $subsubcategory_name_hin,
            'subsubcategory_name_ar' => $subsubcategory_name_ar,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $subsubcategory_name_hin),
            'subsubcategory_slug_ar' => str_replace(' ', '-', $subsubcategory_name_ar),
        ]);
    }

    public function updateSubSubCategory(
        $id,
        string $subsubcategory_name_en,
        string $subsubcategory_name_hin,
        string $subsubcategory_name_ar,
        int $subcategory_id,
        int $category_id
    ) {

        SubSubCategory::findOrFail($id)->update([

            'subcategory_id' => $subcategory_id,
            'category_id' => $category_id,
            'subsubcategory_name_en' => $subsubcategory_name_en,
            'subsubcategory_name_hin' => $subsubcategory_name_hin,
            'subsubcategory_name_ar' => $subsubcategory_name_ar,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $subsubcategory_name_hin),
            'subsubcategory_slug_ar' => str_replace(' ', '-', $subsubcategory_name_ar),


        ]);
    }
}
