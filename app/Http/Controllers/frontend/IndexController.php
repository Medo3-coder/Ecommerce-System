<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Validator;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::with(['subCategories'])->orderBy('category_name_en', 'ASC')->limit(8)->get();
        //   dd($categories);
        $sliders =  Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(6)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        //  get product by category name
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->limit(8)->get();
        $skip_category_3 = Category::skip(3)->first();
        $skip_product_3 = Product::where('status', 1)->where('category_id', $skip_category_3->id)->orderBy('id', 'DESC')->limit(8)->get();
        //get product by brand name
        $skip_brand_Lenovo = Brand::skip(6)->first();
        $skip_product_Lenovo = Product::where('status', 1)->where('brand_id', $skip_brand_Lenovo->id)->orderBy('id', 'DESC')->limit(8)->get();
        // get tags by name
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_ar = Product::groupBy('product_tags_ar')->select('product_tags_ar')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();

        return view(
            'frontend.index',
            compact(
                'categories',
                'sliders',
                'products',
                'featured',
                'hot_deals',
                'special_offer',
                'tags_en',
                'tags_ar',
                'tags_hin',
                'special_deals',
                'skip_product_0',
                'skip_category_0',
                'skip_product_3',
                'skip_category_3',
                'skip_product_Lenovo',
                'skip_brand_Lenovo'
            )
        );
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function userProfileStore(Request $request)
    {


        $Data = User::find(Auth::user()->id);
        $Data->name = $request->name;
        $Data->email = $request->email;
        $Data->phone = $request->phone;



        if ($request->file('profile_photo_path')) {
            $image = $request->file('profile_photo_path');
            $destinationPath  = public_path('upload/user_images/');
            //to replace new Image  of old image
            if (!empty($Data->profile_photo_path)) {
                $repalceOldImg =  unlink($destinationPath . $Data->profile_photo_path);
            }

            $imageName = date('YmdHi') . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            // $imagePath = $destinationPath . $imageName;
            $Data['profile_photo_path'] = $imageName;
        }
        $Data->save();



        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('User_dashboard')->with($notification);
    }

    public function userChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }


    public function userPasswordUpdate(Request $request)
    {

        $validate = $request->validate([
            'oldpassword' => 'required',
            'password'    => 'required|confirmed|min:4|max:20',
            'password_confirmation' => 'required| min:4|max:20'
        ]);

        // if($validator->fails()) {
        //     return response()->json(['error'=>$validator->errors()->all()]);
        // }

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('user.logout');
        } else {
            $notification = array(
                'message' => 'password is not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function productDetails($id, $slug , ProductService $Service)
    {
        $product = Product::findOrFail($id);
        $discountAmount = $product->selling_price - $product->discount_price;
        $netPrice = ($discountAmount / $product->selling_price) * 100;
        $discount_percent = 100 - $netPrice;
        $discount_percentage = round($discount_percent);

        $color =  $Service->productColorSelect($product);

        $hot_deals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $size = $Service->productSizeSelect($product);

        //related product
        $related_product = Product::where('category_id', $product->category_id)
        ->where('id', '!=',$product->id)->orderBy('id', 'DESC')->limit(8)->get();
        // dd($related_product);


        $multiImag = MultiImg::where('product_id', $id)->get();
        // $categories = Category::with(['subCategories'])->orderBy('category_name_en', 'ASC')->limit(8)->get();
        return view('frontend.product.product_details', compact('product', 'hot_deals', 'discountAmount' , 'related_product', 'discount_percentage', 'discount_percent', 'multiImag' ,'color','size'));
    }


    public function productTag($tag)
    {
        $products = Product::where('status', 1)->
         where('product_tags_en', $tag)
        ->orWhere('product_tags_ar', $tag)
        ->orWhere('product_tags_hin', $tag)
        ->paginate(4);
        // dd($products);

        $categories = Category::with(['subCategories'])->orderBy('category_name_en', 'ASC')->limit(8)->get();
        //   dd($products);
        // get tags by name
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_ar = Product::groupBy('product_tags_ar')->select('product_tags_ar')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
        return view('frontend.common.tags_view', compact('products', 'categories' ,'tags_en', 'tags_ar', 'tags_hin'));
    }

    public function categoryWiseProduct($id , $slug)
    {
        $products = Product::where('status', 1)->
        where('category_id', $id)->orderBy('id', 'DESC')->paginate(8);
        // dd($products);
        $categories = Category::with(['subCategories'])->orderBy('category_name_en', 'ASC')->limit(8)->get();
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_ar = Product::groupBy('product_tags_ar')->select('product_tags_ar')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
        return view('frontend.product.category_view', compact('products', 'categories' ,'tags_en', 'tags_ar', 'tags_hin'));
    }



    public function subCategoryWiseProduct($id , $slug)
    {
        $products = Product::where('status', 1)->
        where('subcategory_id', $id)->orderBy('id', 'DESC')->paginate(4);
        // dd($products);
        $categories = Category::with(['subCategories'])->orderBy('category_name_en', 'ASC')->limit(8)->get();
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_ar = Product::groupBy('product_tags_ar')->select('product_tags_ar')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
        return view('frontend.product.subcategory_view', compact('products', 'categories' ,'tags_en', 'tags_ar', 'tags_hin'));
    }





    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    // protected $layout = 'layouts.frontend.header';
    // protected function setupLayout()
    // {
    //     if (!is_null($this->layout)) {
    //        $categories = Category::with(['subCategories'])->orderBy('category_name_en', 'ASC')->limit(8)->get();
    //         $this->layout = View::make($this->layout , $this->$categories);
    //     }
    // }


    public function subSubCategoryWiseProduct($id , $slug)
    {
        $products = Product::where('status', 1)->
        where('subsubcategory_id', $id)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::with(['subCategories'])->orderBy('category_name_en', 'ASC')->limit(8)->get();

        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_ar = Product::groupBy('product_tags_ar')->select('product_tags_ar')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();

        return view('frontend.product.subsubcategory_view', compact('products', 'categories' ,'tags_en', 'tags_ar', 'tags_hin'));

    }

     // Product View Modal with Ajax
    public function productViewModal($id , ProductService $Service)
    {
        $product = Product::with(['brand' , 'category'])->findOrFail($id);
        $color = $Service->productColorSelect($product);
        $size  = $Service->productSizeSelect($product);

        return response()->json(['product' => $product, 'color' => $color, 'size' => $size]);

    }
}
