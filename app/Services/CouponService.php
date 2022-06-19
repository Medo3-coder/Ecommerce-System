<?php

namespace App\Services;

use App\Models\Coupon;

class CouponService
{
    // public function getCoupon($coupon_code)
    // {
    //     $coupon = Coupon::where('coupon_code', $coupon_code)->first();
    //     return $coupon;
    // }

    public function storeCoupon(array $data) {

        $data['coupon_name'] = strtoupper($data['coupon_name']);
         $coupon = Coupon::create($data);

         return $coupon ;
    }

    public function UpdateCoupon(array $data , $id)
    {
        //  $data['id'] = $id;
         $coupon = Coupon::findOrFail($id);
         $data['coupon_name'] = strtoupper($data['coupon_name']);
         $coupon->update($data);
         return $coupon;
    }



}
