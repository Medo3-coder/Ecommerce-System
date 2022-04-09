<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\category\categoryRequest;
use App\Models\Category;
use App\Services\categoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView()
    {
        $category = Category::latest()->get();          //limit check
        return view('backend.category.category_view', compact('category'));
    }

    public function categoryStore(categoryRequest $request , categoryService $service)
    {
        $validation = $request->validated();
        $category = $service->storeCategory(
            $request->category_name_en,
            $request->category_name_hin,
            $request->category_name_ar,
            $request->category_icon
        );

        $notification = array(
            'message' => 'Category Store Successfully',
            'alert-type' => 'success'
        );
        return redirect(route('all.category'))->with($notification);
    }


    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function categoryUpdate(categoryRequest $request , $id , categoryService $service)
    {
        $validation = $request->validated();
        $updateCategory = $service->updateCategory(
            $id,
            $request->category_name_en,
            $request->category_name_hin,
            $request->category_name_ar,
            $request->category_icon
        );
        $notification = array(
            'message' => 'Category updated Successfully',
            'alert-type' => 'info'
        );
        // return view('backend.category.category_view')->with($notification);
        return redirect(route('all.category'))->with($notification);
    }
}
