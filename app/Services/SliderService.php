<?php

namespace App\Services;

use App\Models\Slider;

class SliderService
{

    public function sliderStore(
        $slider_img,
        $title,
        $description

    ) {
        $sliderData = Slider::create([
            'slider_img' => $this->sliderImage($slider_img),
            'title' => $title,
            'description' => $description,

        ]);

        return $sliderData;
    }




    private  function sliderImage($slider_img)
    {
        return FileService::uploadSliderImage("upload/Sliders/", $slider_img);
    }
}
