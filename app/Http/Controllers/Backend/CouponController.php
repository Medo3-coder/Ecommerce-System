<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupon\StoreCouponRequest;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use App\Services\CouponService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponView()
    {
        $coupons = Coupon::orderBy('id', 'desc')->get();
        return view('backend.coupon.coupon_view' , compact('coupons'));
    }

    public function couponStore(CouponService $services , StoreCouponRequest $request)
    {
        $services->storeCoupon($request->validated()) ;

        return redirect()->route('manage-coupon')->with('success', 'Coupon added successfully');
    }
}
