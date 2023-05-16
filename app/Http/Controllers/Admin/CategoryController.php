<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\categories\store;
use App\Http\Requests\Admin\categories\Update;
use App\Models\Category;

class CategoryController extends Controller {
    public function index($id = null) {
        if ($id != null) {
            $categories = Category::find($id)->getAllChildren();
        } else {
            $categories = Category::latest()->get();
        }

        return view('backend.categories.table', compact('categories', 'id'));
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

    public function edit($id) {
        $category   = Category::findOrFail($id);
        $categories = Category::latest()->get();
        return view('backend.categories.edit', compact('category', 'categories'));
    }

    public function update(Update $request, $id) {
        $category = Category::findOrFail($id)->update($request->validated());
        // Report::addToLog('  تعديل قسم');
        return response()->json(['url' => route('categories.index')]);
    }

    public function show($id) {
        $category   = Category::findOrFail($id);
        $categories = Category::get();
        return view('backend.categories.show', compact('categories', 'category'));
    }

    public function destroy($id) {
        $category = Category::findOrFail($id)->delete();

        // Report::addToLog('  حذف قسم') ;
        return response('Post deleted successfully');
    }

}
