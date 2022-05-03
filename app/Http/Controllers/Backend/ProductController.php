<?php

namespace App\Http\Controllers\backend;

use App\helpers\uploadImg;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\product\StoreProduct;
use App\Http\Requests\Admin\product\UpdateProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Services\FileService;
use App\Services\ProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function addProduct()
    {
        $categories = Category::latest()->paginate(10);
        $brands = Brand::latest()->paginate(10);
        return view('backend.product.product_add', compact('categories', 'brands'));
    }



    public function StoreProduct(StoreProduct $request, productService $productService)
    {
        $productService->storeProduct($request->validated());
        return redirect()->route('manage-product')->with('success', 'Product Added Successfully');
    }

    public function manageProduct()
    {

        $products = Product::latest()->get();
        return view('backend.product.product_manage', compact('products'));
    }

    public function editProduct(Product $product)
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $sub_Subcategory = SubSubCategory::latest()->get();
        $multi_img = MultiImg::where('product_id', $product->id)->get();
        return view('backend.product.product_edit', compact('product', 'categories', 'brands', 'sub_Subcategory', 'subcategory', 'multi_img'));
    }

    public function UpdateProduct(UpdateProduct $request, productService $product, $product_id)
    {
        $product->productDataUpdate($request->validated(), $product_id);
        return redirect()->route('manage-product')->with('success', 'Product Updated without Image Successfully');
    }

    //product multi Image Update
    public function multiImageUpdate(Request $request)
    {

        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {

            $imgDel = MultiImg::findOrFail($id);
            if (!empty($imgDel->photo_name)) {

                File::delete($imgDel->photo_name);
            }
            $uploadPath = uploadImg::uploadMultiple($img);

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
            ]);
        }

        return redirect()->route('manage-product')->with('success', 'Product Updated with Image Successfully');
    }

    //product single Image Update
    public function thambnailImageUpdate(Request $request, productService $productService , $id)
    {

        $img = $request->product_thambnail;

        $product = Product::findOrFail($id);

        if (!empty($product->product_thambnail)) {

            File::delete($product->product_thambnail);
        }

        $uploadPath = $productService->productThumbnail($img);

        Product::where('id', $id)->update([
            'product_thambnail' => $uploadPath,
        ]);

        return redirect()->route('manage-product')->with('success', 'Updated Thumbnail Image Successfully');
    }

 //// Multi Image Delete ////
 public function MultiImageDelete($id){

    $oldimg = MultiImg::findOrFail($id);
    unlink($oldimg->photo_name);
    $oldimg->delete();
    return response('Post deleted successfully.', 200);

} // end method


}
