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

    public function editDivision(ShipDivision $shipDivision)
    {
        return view('backend.shipping.division.edit_division' , compact('shipDivision'));
    }

    public function updateDivision(StoreRequest $request , ShippingService $service , $id)
    {
        $service->UpdateDivision($request->validated() , $id);
        return redirect()->route('manage-division')->with('success', 'Division Updated Successfully');
    }

    public function deleteDivision(ShipDivision $shipDivision)
    {
        $shipDivision->delete();
        return response('Division Deleted successfully.', 200);
    }
}
