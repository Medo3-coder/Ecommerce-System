<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function myCart()
    {
        return view('frontend.cart.view_cart');
    }


    public function getCartProduct()
    {
        //This method will return a Collection of CartItems which you can iterate over and show the content to your customers.
        $carts = Cart::content();
        //If you want to know how many items there are in your cart, you can use the count() method.
        $cartQty = Cart::count();
        //The total() method can be used to get the calculated total of all items in the cart,
        $cartTotal = Cart::total();

        return response()->json(['carts' => $carts, 'cartQty' => $cartQty, 'cartTotal' => $cartTotal]);
    }

    public function removeCartProduct($id)
    {
        Cart::remove($id);
        return response()->json(['success' => 'Product removed from cart successfully!']);
    }

    public function incrementCartProduct($rowId)
    {
       $row =  Cart::get($rowId);
       Cart::update($rowId , $row->qty + 1 );
       return response()->json('increment');
    }
}
