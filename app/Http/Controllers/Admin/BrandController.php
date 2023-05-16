<?php

namespace App\Http\Controllers\Admin;

use App\helpers\uploadImg;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\brand\store;
use App\Http\Requests\Admin\brand\Update;
use App\Models\Brand;
use App\Models\Category;
use App\Services\brandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index($id = null) {
        $brands = Brand::latest()->get();
        return view('admin.brands.table', compact('brands'));
    }

    public function create() {
        return view('admin.brands.create');
    }

    public function store(store $request) {
        Brand::create($request->validated());
        return response()->json(['url' => route('brands.index')]);
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }


    public function update(Update $request, $id) {
        $brand = Brand::findOrFail($id)->update($request->validated());
        return response()->json(['url' => route('brands.index')]);
    }

    public function show($id) {
        $brand   = Brand::findOrFail($id);
        return view('admin.brands.show', compact('brand'));
    }

    public function destroy($id) {
        $category = Brand::findOrFail($id)->delete();
        return response('Post deleted successfully');
    }
}
