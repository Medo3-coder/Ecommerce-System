<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\coupons\renewCouponRequest;
use App\Http\Requests\Admin\coupons\store;
use App\Http\Requests\Admin\coupons\Update;
use App\Models\Coupon;

class CouponController extends Controller {
    public function index($id = null) {
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.table', compact('coupons'));
    }

    public function create() {
        return view('admin.coupon.create');
    }

    public function store(store $request) {
        Coupon::create($request->except(['expire_date']) + (['expire_date' => date('Y-m-d H:i:s', strtotime($request->expire_date))]));
        return response()->json(['url' => route('coupons.index')]);
    }

    public function edit($id) {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit', ['coupon' => $coupon]);
    }

    public function update(Update $request, $id) {
        $coupon = Coupon::findOrFail($id)->update($request->except(['expire_date']) + (['expire_date' => date('Y-m-d H:i:s', strtotime($request->expire_date))]));
        return response()->json(['url' => route('coupons.index')]);
    }

    public function show($id) {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.show', ['coupon' => $coupon]);
    }

    public function destroy($id) {
        $coupon = Coupon::findOrFail($id)->delete();
        return response('coupon deleted successfully');
    }

    public function renew(renewCouponRequest $request)
    {
        $coupon = Coupon::findOrFail($request->id) ;
        if ($request->status == 'closed') {
            $coupon->update(['status' => 'closed']) ;
            $html = '<span class="btn btn-sm round btn-outline-success open-coupon" data-toggle="modal" id="div_'.$coupon->id.'" data-target="#notify" data-id="'.$coupon->id.'">
                        '.__('admin.reactivation_Coupon').'  <i class="feather icon-rotate-cw"></i>
                    </span>'
                    ;
        }else{
            $coupon->update($request->except(['expire_date'])  + ([ 'expire_date' => date('Y-m-d H:i:s', strtotime($request->expire_date))]));
            $html = '<span class="btn btn-sm round btn-outline-danger change-coupon-status" data-status="closed" data-id="'.$coupon->id.'">
                        '.__('admin.Stop_Coupon').'  <i class="feather icon-slash"></i>
                    </span>';
        }

        return response()->json(['message' => __('admin.update_coupon_status_successfully') , 'html' => $html , 'id' => $request->id]) ;
    }

}
