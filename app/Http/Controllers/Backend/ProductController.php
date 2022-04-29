<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::latest()->paginate(10);
        $brands = Brand::latest()->paginate(10);
        return view('backend.product.product_add' , compact('categories','brands'));
    }
}
