<?php

namespace App\Services;

use App\helpers\helper;
use Intervention\Image\Facades\Image;

class FileService
{

    public static function thumbnail($path, $image)
    {
        helper::generatePath($path);
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save($path . $name_gen);
        $uploadPath = $path . $name_gen;
        return  $uploadPath;
    }


    public static function multiImage($path, $images)
    {
        helper::generatePath($path);
        $names = [];
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save($path . $make_name);
            $names[] = $path . $make_name;
        }
        return $names;

    }


    public static function ImageBrand($path, $image)
    {
        helper::generatePath($path);
        $unique_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save($path . $unique_name);
        $save_Url = $path . $unique_name;

        return  $save_Url;
    }


    public static function uploadSliderImage($path, $image)
    {
        helper::generatePath($path);
        $unique_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save($path . $unique_name);
        $save_Url = $path . $unique_name;

        return  $save_Url;
    }
}
