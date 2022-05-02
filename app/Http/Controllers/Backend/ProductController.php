<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\product\StoreProduct;
use App\Http\Requests\Admin\product\UpdateProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Services\ProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::latest()->paginate(10);
        $brands = Brand::latest()->paginate(10);
        return view('backend.product.product_add', compact('categories', 'brands'));
    }



    public function StoreProduct(StoreProduct $request , productService $productService){
        $productService->storeProduct($request->validated());
        return redirect()->route('manage-product')->with('success', 'Product Added Successfully');

	}

    public function manageProduct(){

            $products = Product::latest()->get();
            return view('backend.product.product_manage', compact('products'));
    }

    public function editProduct(Product $product){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $sub_Subcategory = SubSubCategory::latest()->get();
        return view('backend.product.product_edit', compact('product', 'categories', 'brands','sub_Subcategory','subcategory'));
    }

    public function UpdateProduct(UpdateProduct $request, productService $product , $product_id){
        $product->productDataUpdate($request->validated(), $product_id);
        return redirect()->route('manage-product')->with('success', 'Product Updated without Image Successfully');
    }
}
