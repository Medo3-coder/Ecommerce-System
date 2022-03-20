<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandStoreRequest;

use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function brandView()
    {
        $brand = Brand::latest()->get();              //limit check
        return view('backend.brand.brand_view', compact('brand'));
    }
    public function brandStore(Request $request)
    {
        $request->validate(
            [
                'brand_name_en' => 'required|max:25',
                'brand_name_hin' => 'required|max:25',
                'brand_name_ar' => 'required|max:25',
                'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'brand_name_en.required' => 'Input Brand English Name',
                'brand_name_hin.required' => 'Input Brand Hindi Name',
                'brand_name_ar.required' => 'Input Brand Arabic Name',
            ]
        );

        $image = $request->file('brand_image');
        $unique_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $unique_name);
        $save_Url = 'upload/brand/' . $unique_name;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_name_ar' => $request->brand_name_ar,
            'brand_slug_en' =>  strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
            'brand_slug_ar' => str_replace(' ', '-', $request->brand_name_ar),
            'brand_image' => $save_Url

        ]);

        $notification = array(
            'message' => 'Brand Store Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
