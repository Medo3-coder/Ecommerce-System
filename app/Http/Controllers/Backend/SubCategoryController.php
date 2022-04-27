<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\subcategory\subCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Services\subCategorySevice;

class SubCategoryController extends Controller
{
    public function subCategoryView()
    {
        $category = Category::orderBy('category_name_en', 'ASC')->paginate(10);
        $subCategory = SubCategory::latest()->paginate(10);
        return view('backend.sub_category.subcategory_view', compact('subCategory', 'category'));
    }


    public function subCategoryStore(subCategoryRequest $request, subCategorySevice $service)
    {
        $validation = $request->validated();
        $service->storeSubCategory(
            $request->sub_category_name_en,
            $request->sub_category_name_hin,
            $request->sub_category_name_ar,
            $request->category_id,
        );

        return back()->with('success', 'SubCategory Added Successfully');
    }


    public function subCategoryEdit(SubCategory $subcategory)
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.sub_category.subcategory_edit', compact('subcategory', 'category'));
    }

    public function subCategoryUpdate(subCategoryRequest $request, subCategorySevice $service, $id)
    {
        $validation = $request->validated();
        $service->updateSubCategory(
            $id,
            $request->sub_category_name_en,
            $request->sub_category_name_hin,
            $request->sub_category_name_ar,
            $request->category_id,
        );

        return redirect(route('all.subcategory'))->with('success', 'SubCategory Updated Successfully');
    }

    public function subCategoryDelete(SubCategory $subcategory)
    {
        $subcategory->delete();
        return response('Post deleted successfully.', 200);
    }
}
