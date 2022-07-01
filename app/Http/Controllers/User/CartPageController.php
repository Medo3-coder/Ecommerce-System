<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $cartTotal = (int) str_replace(',','',Cart::total());   // 2,700.00 to 2700

        return response()->json(['carts' => $carts, 'cartQty' => $cartQty, 'cartTotal' => $cartTotal]);
    }

    public function removeCartProduct($id)
    {
        Cart::remove($id);
        if(Session::has('coupon'))
        {
            Session::forget('coupon');
        }

        return response()->json(['success' => 'Product removed from cart successfully!']);
    }

    public function incrementCartProduct($rowId)
    {
         $row =  Cart::get($rowId);
       Cart::update($rowId , $row->qty + 1 );



       if(Session::has('coupon'))
       {
        $total = (int)str_replace(',','',Cart::total());
              $coupon = Session::get('coupon');
              $coupon = Coupon::where('coupon_name' , $coupon['coupon_name'])->first();

              Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round($total* ($coupon->coupon_discount / 100)),
                'total_amount' =>round($total - $total * $coupon->coupon_discount / 100  ),
            ]);

       }


       return response()->json('Increment');



    }

    public function decrementCartProduct($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId , $row->qty - 1 );


        if(Session::has('coupon'))
       {
        $total = (int)str_replace(',','',Cart::total());
              $coupon = Session::get('coupon');
              $coupon = Coupon::where('coupon_name' , $coupon['coupon_name'])->first();

              Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round($total* ($coupon->coupon_discount / 100)),
                'total_amount' =>round($total - $total * $coupon->coupon_discount / 100  ),
            ]);

       }



        return response()->json('Decrement');
    }

    public function couponApply(Request $request)
    {
        // dd($request->coupon_name);
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
            //    dd($coupon);
       if($coupon)
       {
        $total = (int)str_replace(',','',Cart::total());
        // dd($total);
              Session::put('coupon' ,   [
                 'coupon_name' => $coupon->coupon_name,
                 'coupon_discount' => $coupon->coupon_discount,
                 'discount_amount' => round($total* ($coupon->coupon_discount / 100)),
                 'total_amount' =>round($total - $total * $coupon->coupon_discount / 100  ),

              ]);
            //   Cart::coupon($coupon->coupon_name , $coupon->discount_amount);
              return response()->json(['success' => 'Coupon applied successfully!']);
         }
         else
         {
              return response()->json(['error' => 'Coupon Invalid!']);
       }
    }



    public function couponCalculation()
    {
        if(Session::has('coupon'))
        {
            return response()->json(
                [
                    'subtotal' => Cart::total(),
                    'coupon_name' => Session::get('coupon.coupon_name'),
                    // 'coupon_name' => Session::get('coupon')['coupon_name'],
                    'coupon_discount' => Session::get('coupon.coupon_discount'),
                    'discount_amount' => Session::get('coupon.discount_amount'),
                    'total_amount' => Session::get('coupon.total_amount'),
                ]
            );

        }

        else{
            return response()->json(
                [
                    'total' => Cart::total(),
                    'coupon_name' => '',
                    'coupon_discount' => '',
                    'discount_amount' => '',

                ]
            );
        }
    }



    public function couponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon removed successfully!']);
    }

    public function checkoutCreate()
    {
        if(Auth::check())
        {
            // return redirect()->route('checkout.index');
            if(Cart::total() > 0)
            {
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = (int) str_replace(',','',Cart::total());   // 2,700.00 to 2700
            // $cartTotal =  Cart::total();

            return view('frontend.checkout.checkout_view' , compact('carts' , 'cartQty','cartTotal'));
            }
            else
            {
                return redirect()->to('/')->with('error','Shopping at Least One Product');
            }
        }
        else
        {
            return redirect()->route('login')->with('error','You Need to Login First to Checkout');
        }
    }

}


