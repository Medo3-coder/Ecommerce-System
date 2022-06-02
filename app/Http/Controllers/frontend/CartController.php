<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->discount_price == null) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'color' => $request->color,
                    'size' => $request->size,
                    'image' => $request->product_thambnail,
                ],
            ]);

            return response()->json(['success' => 'Product added to cart successfully!']);
        }
        else
        {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'color' => $request->color,
                    'size' => $request->size,
                    'image' => $request->product_thambnail,
                ],
            ]);

            return response()->json(['success' => 'Product added to cart successfully!']);
        }
    }
}
