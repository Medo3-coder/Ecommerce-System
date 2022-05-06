<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Slider;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Admin\slider\SliderStore;
use App\Services\SliderService;

class SliderController extends Controller
{
    public function sliderView()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }


    public function sliderStore(SliderStore $request, SliderService $service)
    {
        $service->sliderStore(
            $request->slider_img,
            $request->title,
            $request->description,

        );

        return redirect()->route('manage-slider')->with('success', 'Slider Added Successfully');
    }
}
