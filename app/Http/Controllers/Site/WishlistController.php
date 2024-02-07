<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller {

    public function addToWishlist(Request $request, $product_id) {
        if (Auth::check()) {
            $wishlistItem = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$wishlistItem) {
                Wishlist::create([
                    'user_id'    => Auth::id(),
                    'product_id' => $product_id,
                ]);

                return response()->json(['success' => 'Product added to wishlist']);
            } else {
                return response()->json(['error' => 'This Product has already in Your wishlist']);
            }
        }

        return response()->json(['error' => 'Please log in to add products to your wishlist']);
    }

    public function viewWishlist() {

        return view('site.wishlist.view');
    }

    public function getWishlistProduct() {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlist);
    }

    public function removeWishlistProduct($id) {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $id)->delete();
        return response()->json(['success' => 'Product removed from wishlist']);
    }
}
