<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shipping\StoreRequest;
use App\Models\ShipDivision;
use App\Services\ShippingService;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function divisionView ()
    {
        $division = ShipDivision::orderBy('id' , 'DESC')->get();
        return view('backend.shipping.division.view_division', compact('division'));
    }

    public function divisionStore(StoreRequest $request , ShippingService $service)
    {
        $service->storeDivision($request->validated());

        return redirect()->route('manage-division')->with('success', 'Division added Successfully');
    }
}
