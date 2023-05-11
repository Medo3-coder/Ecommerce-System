<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\category\categoryRequest;
use App\Models\Category;
use App\Services\categoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id = null)
    {
        // $category = Category::latest()->get();         //limit check
        $categories = Category::where('parent_id' , $id)->paginate(3);

        return view('backend.categories.table', compact('categories'));
    }


    public function create($id = null)
    {
        $categories = Category::latest()->get();
        return view('admin.categories.create' , compact('categories' , 'id'));
    }


    public function categoryStore(categoryRequest $request, categoryService $service)
    {
        $validation = $request->validated();
        $category = $service->storeCategory(
            $request->category_name_en,
            $request->category_name_hin,
            $request->category_name_ar,
            $request->category_icon
        );
        return back()->with('success', 'Category Added Successfully');
    }


    public function categoryEdit(Category $category)
    {
        return view('backend.category.category_edit', compact('category'));
    }

    public function categoryUpdate(categoryRequest $request, $id, categoryService $service)
    {
        $validation = $request->validated();
        $updateCategory = $service->updateCategory(
            $id,
            $request->category_name_en,
            $request->category_name_hin,
            $request->category_name_ar,
            $request->category_icon
        );
        return redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }



    public function show($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::get();
        return view('admin.categories.show' , compact('categories'));
    }



    public function categoryDelete(Category $category)
    {
        //route model binding
        $category->delete();

        return response('Post deleted successfully.', 200);
    }
}
