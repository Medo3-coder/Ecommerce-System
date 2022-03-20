<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandView()
    {
        $brand = Brand::latest()->get();              //limit check
        return view('backend.brand.brand_view' , compact('brand'));
    }
}
