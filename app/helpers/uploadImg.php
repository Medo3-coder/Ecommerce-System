<?php

namespace App\helpers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class uploadImg{

    public static function uploadImageBrand($image){

            $unique_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $unique_name);
            $save_Url = 'upload/brand/' . $unique_name;

        return $save_Url;
    }



    public static function uploadAdminImage($image){

        $destinationPath  = public_path('upload/admin_images/');
        $imageName = date('YmdHi') . $image->getClientOriginalName();
        $save_Url = $image->move($destinationPath, $imageName);

    return $save_Url;
}

public static function uploadMultiple($image)
{
    $make_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
    $uploadPath = 'upload/products/multi-image/'.$make_name;

    return $uploadPath;
}

}
