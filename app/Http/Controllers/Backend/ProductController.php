<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\product\StoreProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
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



    public function StoreProduct(Request $request , productService $productService){

      $image = $request->file('product_thambnail');

      $product = Product::create([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_hin' => $request->product_name_hin,
        'product_name_ar' => $request->product_name_ar,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
        'product_slug_ar' => str_replace(' ', '-', $request->product_name_ar),
      	'product_code' => $request->product_code,
      	'product_qty' => $request->product_qty,
      	'product_tags_en' => $request->product_tags_en,
      	'product_tags_hin' => $request->product_tags_hin,
        'product_tags_ar' => $request->product_tags_ar,
      	'product_size_en' => $request->product_size_en,
      	'product_size_hin' => $request->product_size_hin,
        'product_size_ar' => $request->product_size_ar,
        'product_size_ar' => $request->product_size_ar,
      	'product_color_en' => $request->product_color_en,
      	'product_color_hin' => $request->product_color_hin,
        'product_color_ar' => $request->product_color_ar,
      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_descp_en' => $request->short_descp_en,
      	'short_descp_hin' => $request->short_descp_hin,
        'short_descp_ar' => $request->short_descp_ar,
      	'long_descp_en' => $request->long_descp_en,
      	'long_descp_hin' => $request->long_descp_hin,
        'long_descp_ar' => $request->long_descp_ar,
      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,
      	'product_thambnail' => $productService->productThumbnail($image),
      	'status' => 1,
        'created_at' => Carbon::now(),
      ]);

      $images = $request->file('multi_img');
    	MultiImg::create([

    		'product_id' => $product->id,
    		'photo_name' => $productService->productMultiImg($images),
            'created_at' => Carbon::now(),

    	]);

    return redirect()->route('manage-product')->with('success', 'Product Added Successfully');

	}

    public function manageProduct(){

            $products = Product::latest()->get();
            return view('backend.product.product_manage', compact('products'));
    }
}
