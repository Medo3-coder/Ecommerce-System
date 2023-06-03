<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\District\Store;
use App\Http\Requests\Admin\District\storeRequest;
use App\Http\Requests\Admin\District\Update;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Services\Districtservices;
use Illuminate\Http\Request;

class ShippingDistrictController extends Controller
{

    public function index($id = null) {
        $districts  = ShipDistrict::latest()->get();
        return view('admin.shipping.district.table', compact( 'districts'));
    }

    public function create() {
        $divisions = ShipDivision::latest()->get();
        return view('admin.shipping.district.create' , compact('divisions'));
    }


    public function store(Store $request) {
        ShipDistrict::create($request->validated());
        return response()->json(['url' => route('district.index')]);
    }


    public function edit($id) {
        $district = ShipDistrict::findOrFail($id);
        $divisions = ShipDivision::latest()->get();
        return view('admin.shipping.district.edit', compact('divisions' , 'district'));
    }

    public function update(Update $request, $id) {
        $division = ShipDistrict::findOrFail($id)->update($request->validated());
        return response()->json(['url' => route('district.index')]);
    }


    public function show($id) {
        $district   = ShipDistrict::findOrFail($id);
        $divisions = ShipDivision::latest()->get();
        return view('admin.shipping.district.show', compact('district','divisions'));
    }

    public function destroy($id) {
        $district = ShipDistrict::findOrFail($id)->delete();
        return response('district deleted successfully');
    }
}
