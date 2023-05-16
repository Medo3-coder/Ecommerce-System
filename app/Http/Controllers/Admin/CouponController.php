<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupon\StoreCouponRequest;
use App\Http\Requests\Admin\Coupon\UpdateCouponRequest;
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

    public function couponEdit(Coupon $coupon)
    {
        return view('backend.coupon.edit_coupon' , compact('coupon'));
    }


    public function couponUpdate(UpdateCouponRequest $request ,  $id , CouponService $services)
    {
        $services->updateCoupon($request->validated() , $id) ;

        return redirect()->route('manage-coupon')->with('success', 'Coupon updated successfully');
    }

    public function couponDelete(Coupon $coupon)
    {
        $coupon->delete();
        return response('Coupon deleted successfully');
    }



}
