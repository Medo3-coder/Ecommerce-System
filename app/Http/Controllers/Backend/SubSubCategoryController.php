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

    public function getSubCategory($category_id)
    {
        $category = SubCategory::where('category_id', $category_id)->orderBy('sub_category_name_en', 'ASC')->get();
        return json_encode($category);
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

        $notification = array(
            'message' => 'SubSubCategory Created Successfully',
            'alert-type' => 'success'
        );

        return redirect(route('all.subsubcategory'))->with($notification);
    }

    public function subSubCategoryEdit(SubSubCategory $sub_subcategory)
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::orderBy('sub_category_name_en', 'ASC')->get();
        return view('backend.sub_sub_category.sub_subcategory_edit', compact('sub_subcategory','subcategory', 'category'));
    }

    public function subSubCategoryUpdate(SubRequest $request , subSubCategoryService $service , $id)
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

        $notification = array(
            'message' => 'SubSubCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect(route('all.subsubcategory'))->with($notification);
    }

    public function subSubCategoryDelete(SubSubCategory $sub_subcategory)
    {

        $sub_subcategory->delete();
        return response('Post deleted successfully.', 200);

    }
}
