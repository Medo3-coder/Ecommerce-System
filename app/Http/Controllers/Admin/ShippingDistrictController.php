<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\District\storeRequest;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Services\Districtservices;
use Illuminate\Http\Request;

class ShippingDistrictController extends Controller
{
    public function districtView()
    {
       $division = ShipDivision::orderBy('division_name' , 'ASC')->get();
       $district = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();
       return  view('admin.shipping.district.view_district',compact('division','district'));

    }

    public function districtStore(storeRequest $request , Districtservices $service)
    {
        $service->storeDistrict($request->validated());
        return redirect()->route('manage-district')->with('success', 'Division added Successfully');
    }

    public function editdistrict(ShipDistrict $district)
    {
        $division = ShipDivision::orderBy('division_name' , 'ASC')->get();
        return view('admin.shipping.district.edit_district' , compact('district' , 'division'));
    }

    public function updatedistrict(storeRequest $request , Districtservices $service , $id)
    {
        $service->updateDistrict($request->validated() , $id);
        return redirect()->route('manage-district')->with('success', 'Division updated Successfully');
    }


    public function deletedistrict(ShipDistrict $district)
    {
        $district->delete();
        return response('District Deleted successfully.', 200);
    }
}
