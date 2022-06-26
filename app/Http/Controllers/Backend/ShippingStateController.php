<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\State\storeStateRequest;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use App\Services\StateService;
use Illuminate\Http\Request;

class ShippingStateController extends Controller
{
    public function stateView()
    {
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::with('division' , 'district')->orderBy('id','DESC')->get();

        return view('backend.shipping.state.view_state',compact('division','district','state'));
    }

    public function stateStore(storeStateRequest $request , StateService $service)
    {
        $service->storeShippingState($request->validated());
        return redirect()->route('manage-state')->with('success', 'State added Successfully');
    }

    public function editstate(ShipState  $state)
    {
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        return view('backend.shipping.state.edit_state' , compact('state','district' , 'division'));
    }

    public function updatestate(storeStateRequest $request , StateService $service , $id)
    {
        $service->updateShippingState($request->validated() , $id);
        return redirect()->route('manage-state')->with('success', 'State updated Successfully');
    }

    public function deletestate(ShipState $state)
    {
        $state->delete();
        return response('State Delete successfully');
    }

}
