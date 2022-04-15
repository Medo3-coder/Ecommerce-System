<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function subSubCategoryView()
    {
        $category = Category::orderBy('category_name_en', 'ASC')->paginate();
        $sub_subcategory = SubSubCategory::latest()->paginate(10);

        return view('backend.sub_sub_category.sub_subcategory_view',compact('sub_subcategory','category'));
    }

    public function getSubCategory($category_id)
    {
        $category = SubCategory::where('category_id', $category_id)->orderBy('sub_category_name_en', 'ASC')->get();
        return json_encode($category);

    }
}
