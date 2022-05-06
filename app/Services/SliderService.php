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


    public function updateSlider(
        $slider_img,
        $title,
        $description,
        $id


    ) {

        if ($slider_img) {
            $this->deleteOldImage($id);

            $WithImage=   Slider::findOrFail($id)->update([

                'title' => $title,
                'description' => $description,
                'slider_img' => $this->sliderImage($slider_img),

            ]);
        } else {
         $noImage=    Slider::findOrFail($id)->update([
                'title' => $title,
                'description' => $description,

            ]);
        }

        // dd($noImage);
        // dd($WithImage);
    }




    private  function sliderImage($slider_img)
    {
        return FileService::uploadSliderImage("upload/Sliders/", $slider_img);
    }


    private  function deleteOldImage($id)
    {
        $image = Slider::findOrFail($id);
        if ($image) {

            unlink($image->slider_img);
        }
    }
}
