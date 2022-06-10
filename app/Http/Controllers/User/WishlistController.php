<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{


    public function addToWishlist(Request $request, $product_id)
    {

        if (Auth::check())
        {
              $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

              if(!$exists)
              {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                ]);
                return response()->json(['success' => 'Product added to wishlist']);
              }
              else
              {
                return response()->json(['error' => 'Product already in wishlist']);
              }


        }
         else
     {
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }
}
