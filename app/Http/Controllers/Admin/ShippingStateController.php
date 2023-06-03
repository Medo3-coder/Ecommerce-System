<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\State\Store;
use App\Http\Requests\Admin\State\storeStateRequest;
use App\Http\Requests\Admin\State\Update;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use App\Services\StateService;
use Illuminate\Http\Request;

class ShippingStateController extends Controller
{

    public function stateStore(storeStateRequest $request , StateService $service)
    {
        $service->storeShippingState($request->validated());
        return redirect()->route('manage-state')->with('success', 'State added Successfully');
    }

    public function editstate(ShipState  $state)
    {
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        return view('admin.shipping.state.edit_state' , compact('state','district' , 'division'));
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







    public function index($id = null) {
        $states  = ShipState::latest()->get();
        return view('admin.shipping.state.table', compact('states'));
    }

    public function create() {
        $divisions = ShipDivision::latest()->get();
        $districts = ShipDistrict::latest()->get();
        return view('admin.shipping.state.create' , compact('divisions','districts'));
    }


    public function store(Store $request) {
        ShipState::create($request->validated());
        return response()->json(['url' => route('state.index')]);
    }


    public function edit($id) {
        $state = ShipState::findOrFail($id);
        $divisions = ShipDivision::latest()->get();
        $districts = ShipDistrict::latest()->get();
        return view('admin.shipping.state.edit', compact('state','divisions' , 'districts'));
    }

    public function update(Update $request, $id) {
        $state = ShipState::findOrFail($id)->update($request->validated());
        return response()->json(['url' => route('state.index')]);
    }


    public function show($id) {
        $state   = ShipState::findOrFail($id);
        $divisions = ShipDivision::latest()->get();
        $districts = ShipDistrict::latest()->get();

        return view('admin.shipping.state.show', compact('districts','divisions','state'));
    }

    public function destroy($id) {
        $district = ShipDistrict::findOrFail($id)->delete();
        return response('district deleted successfully');
    }


}
