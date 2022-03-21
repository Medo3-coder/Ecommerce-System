<?php

namespace App\Http\Controllers\Backend;

use App\helpers\uploadImg;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandStoreRequest;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function brandView()
    {
        $brand = Brand::orderBy('id', 'DESC')->get();          //limit check
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
        $save_Url = uploadImg::uploadImageBrand($image);

        Brand::create([
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

    public function brandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }

    public function brandUpdate(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'brand_name_en' => 'required|max:25',
                'brand_name_hin' => 'required|max:25',
                'brand_name_ar' => 'required|max:25',

            ],
            [
                'brand_name_en.required' => 'Input Brand English Name',
                'brand_name_hin.required' => 'Input Brand Hindi Name',
                'brand_name_ar.required' => 'Input Brand Arabic Name',
            ]
        );

        $image = $request->file('brand_image');

        if ($image) {
            $this->deleteOldImage($id);

            $save_Url = uploadImg::uploadImageBrand($image);
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' =>  strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
                'brand_slug_ar' => str_replace(' ', '-', $request->brand_name_ar),
                'brand_image' => $save_Url

            ]);

            $notification = array(
                'message' => 'Brand updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' =>  strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
                'brand_slug_ar' => str_replace(' ', '-', $request->brand_name_ar),


            ]);
            $notification = array(
                'message' => 'Brand updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function brandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);
        $brand->delete();

      return response('Post deleted successfully.', 200);

    }


    protected function deleteOldImage($id)
    {
        $image = Brand::findOrFail($id);
        if ($image) {
            $repalceOldImg = unlink($image->brand_image);
        }
    }
}
