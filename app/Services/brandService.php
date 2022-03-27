<?php

namespace App\Services;

use App\Models\Brand;
use Intervention\Image\Facades\Image;

class brandService
{

    public function storeBrand(
        string $brand_name_en,
        string $brand_name_hin,
        string $brand_name_ar,
        $brand_image

    ) {
        Brand::create([
            'brand_name_en' => $brand_name_en,
            'brand_name_hin' => $brand_name_hin,
            'brand_name_ar' => $brand_name_ar,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $brand_name_en)),
            'brand_slug_hin' => str_replace(' ', '-', $brand_name_hin),
            'brand_slug_ar' => str_replace(' ', '-', $brand_name_ar),
            'brand_image' => $this->uploadImageBrand($brand_image),

        ]);
    }




    public function updateBrand(
        $id,
        string $brand_name_en,
        string $brand_name_hin,
        string $brand_name_ar,
        $brand_image
    ) {
        if ($brand_image) {
            $this->deleteOldImage($id);

            Brand::findOrFail($id)->update([
                'brand_name_en' => $brand_name_en,
                'brand_name_hin' => $brand_name_hin,
                'brand_name_ar' => $brand_name_ar,
                'brand_slug_en' =>  strtolower(str_replace(' ', '-', $brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $brand_name_hin),
                'brand_slug_ar' => str_replace(' ', '-', $brand_name_ar),
                'brand_image' => $this->uploadImageBrand($brand_image),
            ]);
        } else {
            Brand::findOrFail($id)->update([
                'brand_name_en' => $brand_name_en,
                'brand_name_hin' => $brand_name_hin,
                'brand_name_ar' => $brand_name_ar,
                'brand_slug_en' =>  strtolower(str_replace(' ', '-', $brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $brand_name_hin),
                'brand_slug_ar' => str_replace(' ', '-', $brand_name_ar),

            ]);
        }
    }


    private static function deleteOldImage($id)
    {
        $image = Brand::findOrFail($id);
        if ($image) {
            $repalceOldImg = unlink($image->brand_image);
        }
    }



    private static function uploadImageBrand($image)
    {
        $unique_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $unique_name);
        $save_Url = 'upload/brand/' . $unique_name;

        return $save_Url;
    }
}
