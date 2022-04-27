<?php

namespace App\Http\Controllers\Backend;

use App\helpers\uploadImg;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\brand\BrandStoreRequest;
use App\Http\Requests\Admin\brand\BrandUpdateRequest;
use App\Models\Brand;
use App\Services\brandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function brandView()
    {
        $brand = Brand::latest()->paginate(10);        //limit check
        return view('backend.brand.brand_view', compact('brand'));
    }

    public function brandStore(BrandStoreRequest $request, brandService $service)
    {
        $validation = $request->validated();
        $brand = $service->storeBrand(
            $request->brand_name_en,
            $request->brand_name_hin,
            $request->brand_name_ar,
            $request->brand_image

        );
        return back()->with('success', 'Brand Added Successfully');
    }

    public function brandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }

    public function brandUpdate(BrandUpdateRequest $request, $id, brandService $service)
    {

        $validation = $request->validated();
        $updateBrand = $service->updateBrand(
            $id,
            $request->brand_name_en,
            $request->brand_name_hin,
            $request->brand_name_ar,
            $request->brand_image
        );

        return redirect()->route('all.brand')->with('success', 'Brand Updated Successfully');
    }

    public function brandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);
        $brand->delete();

        return response('Post deleted successfully.', 200);
    }
}
