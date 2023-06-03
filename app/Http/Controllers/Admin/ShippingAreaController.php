<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Divisions\Store;
use App\Http\Requests\Admin\Divisions\Update;
use App\Models\ShipDivision;

class ShippingAreaController extends Controller {

    public function index($id = null) {
        $divisions = ShipDivision::latest()->get();
        return view('admin.shipping.division.table', compact('divisions'));
    }

    public function create() {
        return view('admin.shipping.division.create');
    }

    public function store(Store $request) {
        ShipDivision::create($request->validated());
        return response()->json(['url' => route('division.index')]);
    }

    public function edit($id) {
        $division = ShipDivision::findOrFail($id);
        return view('admin.shipping.division.edit', compact('division'));
    }

    public function update(Update $request, $id) {
        $division = ShipDivision::findOrFail($id)->update($request->validated());
        return response()->json(['url' => route('division.index')]);
    }

    public function show($id) {
        $division = ShipDivision::findOrFail($id);
        return view('admin.shipping.division.show', compact('division'));
    }

    public function destroy($id) {
        $category = ShipDivision::findOrFail($id)->delete();
        return response('Brand deleted successfully');
    }
}
