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
        return response()->json(['error' => 'Something went wrong!']);
    }


    public function addMiniCart()
    {
        //This method will return a Collection of CartItems which you can iterate over and show the content to your customers.
         $carts = Cart::content();
         //If you want to know how many items there are in your cart, you can use the count() method.
         $cartQty = Cart::count();
         //The total() method can be used to get the calculated total of all items in the cart,
         $cartTotal = Cart::total();

         return response()->json(['carts' => $carts, 'cartQty' => $cartQty, 'cartTotal' => round($cartTotal)]);

    }







}
