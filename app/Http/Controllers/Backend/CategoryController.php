<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\categories\store;
use App\Models\Category;
use App\Services\categoryService;

class CategoryController extends Controller {
    public function index($id = null) {
        $categories = Category::latest()->get();
        return view('backend.categories.table', compact('categories'));
    }

    public function create($id = null) {
        $categories = Category::latest()->get();
        return view('backend.categories.create', compact('categories', 'id'));
    }

    public function store(Store $request) {
        Category::create($request->validated());
        // Report::addToLog('  اضافه قسم') ;
        return response()->json(['url' => route('categories.index')]);
    }

    // public function categoryEdit(Category $category) {
    //     return view('backend.category.category_edit', compact('category'));
    // }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::latest()->get();
        return view('backend.categories.edit' , compact('category' , 'categories'));
    }

    public function categoryUpdate(categoryRequest $request, $id, categoryService $service) {
        $validation     = $request->validated();
        $updateCategory = $service->updateCategory(
            $id,
            $request->category_name_en,
            $request->category_name_hin,
            $request->category_name_ar,
            $request->category_icon
        );
        return redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }

    public function show($id) {
        $category   = Category::findOrFail($id);
        $categories = Category::get();
        return view('admin.categories.show', compact('categories'));
    }

    public function categoryDelete(Category $category) {
        //route model binding
        $category->delete();

        return response('Post deleted successfully.', 200);
    }
}
