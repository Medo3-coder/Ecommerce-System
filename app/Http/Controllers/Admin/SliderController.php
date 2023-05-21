<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\slider\store;
use App\Http\Requests\Admin\slider\Update;
use App\Models\Slider;

class SliderController extends Controller {
    public function index($id = null) {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.sliders.table', compact('sliders'));
    }

    public function create() {
        return view('admin.sliders.create');
    }

    public function store(store $request) {
        Slider::create($request->validated());
        return response()->json(['url' => route('sliders.index')]);
    }

    public function edit($id) {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Update $request, $id) {
        $slider = Slider::findOrFail($id)->update($request->validated());
        return response()->json(['url' => route('sliders.index')]);
    }

    public function show($id) {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.show', compact('slider'));
    }

    public function destroy($id) {
        $slider = Slider::findOrFail($id)->delete();
        return response("__('the_selected_has_been_successfully_deleted)");
    }

    // public function sliderActive(Slider $slider) {
    //     $slider->update([
    //         'status' => 1,
    //     ]);
    //     return back()->with('success', 'Slider Active Successfully');
    // }
}
