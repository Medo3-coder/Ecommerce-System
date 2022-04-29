<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\sub_SubCategory\SubRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Services\subSubCategoryService;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function subSubCategoryView()
    {
        $category = Category::orderBy('category_name_en', 'ASC')->paginate();
        $sub_subcategory = SubSubCategory::latest()->paginate(10);

        return view('backend.sub_sub_category.sub_subcategory_view', compact('sub_subcategory', 'category'));
    }

     // get subcategory by ajax  request
    public function getSubCategory($category_id)
    {
        $category = SubCategory::where('category_id', $category_id)->orderBy('sub_category_name_en', 'ASC')->get();
        return json_encode($category);
    }


    // get sub_subcategory by ajax  request
    public function getSubSubCategory($subcategory_id)
    {
        $sub_subcategory = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($sub_subcategory);
    }

    public function subSubCategoryStore(SubRequest $request, subSubCategoryService $service)
    {
        $validation = $request->validated();

        $service->storeSubSubCategory(
            $request->subsubcategory_name_en,
            $request->subsubcategory_name_hin,
            $request->subsubcategory_name_ar,
            $request->subcategory_id,
            $request->category_id
        );

        return redirect()->route('all.subsubcategory')->with('success', 'Sub SubCategory Added Successfully');
    }

    public function subSubCategoryEdit(SubSubCategory $sub_subcategory)
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::orderBy('sub_category_name_en', 'ASC')->get();
        return view('backend.sub_sub_category.sub_subcategory_edit', compact('sub_subcategory', 'subcategory', 'category'));
    }

    public function subSubCategoryUpdate(SubRequest $request, subSubCategoryService $service, $id)
    {

        $validation = $request->validated();

        $service->updateSubSubCategory(
            $id,
            $request->subsubcategory_name_en,
            $request->subsubcategory_name_hin,
            $request->subsubcategory_name_ar,
            $request->subcategory_id,
            $request->category_id
        );

        return redirect()->route('all.subsubcategory')->with('success', 'Sub SubCategory Updated Successfully');
    }

    public function subSubCategoryDelete(SubSubCategory $sub_subcategory)
    {

        $sub_subcategory->delete();
        return response('Post deleted successfully.', 200);
    }
}
