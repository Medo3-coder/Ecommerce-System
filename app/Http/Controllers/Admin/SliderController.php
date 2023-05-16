<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Slider;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Admin\slider\SliderStore;
use App\Http\Requests\Admin\slider\SliderUpdate;
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

    public function sliderUpdate(SliderUpdate $request, SliderService $service, $id)
    {
        $service->updateSlider(
            $request->slider_img,
            $request->title,
            $request->description,
            $id
        );

        return redirect()->route('manage-slider')->with('success', 'Slider Updated Successfully');
    }

    public function sliderDelete(Slider $slider)
    {
        $image = $slider->slider_img;
        if ($image) {
            unlink($image);
        }

        $slider->delete();
        return response('Slider deleted successfully.', 200);
    }

    public function sliderEdit(Slider $slider)
    {
        return view('backend.slider.slider_edit', compact('slider'));
    }


    public function sliderInactive(Slider $slider)
    {
        $slider->update([
            'status' => 0,
        ]);
        return back()->with('success', 'Slider Inactive Successfully');
    }


    public function sliderActive(Slider $slider)
    {
        $slider->update([
            'status' => 1,
        ]);
        return back()->with('success', 'Slider Active Successfully');
    }
}
