<?php

namespace App\Http\Controllers\Admin;

use App\helpers\uploadImg;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\product\Store;
use App\Http\Requests\Admin\product\Update;
use App\Http\Requests\Admin\product\UpdateProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller {

    // public function addProduct()
    // {
    //     $categories = Category::latest()->paginate(10);
    //     $brands = Brand::latest()->paginate(10);
    //     return view('admin.product.product_add', compact('categories', 'brands'));
    // }

    // public function index()
    // {
    //     $products = Product::latest()->get();
    //     return view('admin.product.table', compact('products'));
    // }

    public function index() {
        $products = Product::latest()->get();
        return view('admin.product.table', compact('products'));
    }

    public function create() {
        $categories = Category::where('parent_id', null)->get();
        $brands     = Brand::latest()->get();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function store(store $request) {
        $product = Product::create($request->validated());
        if (isset($request->images)) {
            foreach ($request->images as $image) {
                ProductImage::create(['image' => $image, 'product_id' => $product->id]);
            }
        }
        return response()->json(['url' => route('products.index')]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('parent_id', null)->get();
        $brands  = Brand::latest()->get();
        $productImages = ProductImage::where('product_id', $product->id)->get();
        return view('admin.product.edit', compact('product','brands' , 'categories' , 'productImages'));
    }


    public function update(Update $request, $id) {
        $product = Product::findOrFail($id)->update($request->validated());
        return response()->json(['url' => route('products.index')]);
    }

    public function show($id) {
        $product = Product::find($id);
        $categories = Category::where('parent_id', null)->get();
        $brands  = Brand::latest()->get();
        $productImages = ProductImage::where('product_id', $product->id)->get();
        return view('admin.product.show', compact('product','brands' , 'categories' , 'productImages'));
    }

    public function destroy($id) {
        $Product = Product::findOrFail($id)->delete();
        return response('Product deleted successfully');
    }

    // public function productInactive(Product $product) {
    //     $product->update([
    //         'status' => 0,
    //     ]);
    //     return back()->with('success', 'Product Inactive Successfully');
    // }

    // public function productActive(Product $product) {
    //     $product->update([
    //         'status' => 1,
    //     ]);
    //     return back()->with('success', 'Product Active Successfully');
    // }

}
