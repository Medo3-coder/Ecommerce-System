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


    private  function deleteOldImage($id)
    {
        $image = Brand::findOrFail($id);
        if ($image) {
            $repalceOldImg = unlink($image->brand_image);
        }
    }



    private  function uploadImageBrand($image)
    {


        return FileService::ImageBrand("upload/brands/", $image);
    }
}
