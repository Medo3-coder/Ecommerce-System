<?php
namespace Database\Seeders;
use App\Models\Brand;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder {

    public function run() {

          // 1
          DB::table('brands')->insert([
            [
                'name'              => json_encode(['en' => 'Apple'  , 'ar' => 'ابل' ] , JSON_UNESCAPED_UNICODE) ,
                'slug'             =>  json_encode(['en' => 'apple'  , 'ar' => 'ابل' ] , JSON_UNESCAPED_UNICODE) ,
                'image'            =>  "default.png" ,
                'created_at'        => Carbon::now()
            ],[
                'name'              => json_encode(['en' => 'Huawei'  , 'ar' =>'هواوي'] , JSON_UNESCAPED_UNICODE) ,
                'slug'              => json_encode(['en' => 'huawei'  , 'ar' => 'هواوي' ] , JSON_UNESCAPED_UNICODE) ,
                'image'            =>  "default.png" ,
                'created_at'        => Carbon::now()
            ],[
                'name'              => json_encode(['en' => 'Oppo'  , 'ar' => 'ابوو'] , JSON_UNESCAPED_UNICODE) ,
                'slug'              => json_encode(['en' => 'oppo'  , 'ar' => 'ابوو' ] , JSON_UNESCAPED_UNICODE) ,
                'image'            =>  "default.png" ,
                'created_at'        => Carbon::now()
            ],[
                'name'              => json_encode(['en' => 'Samsung'  , 'ar' => 'سامسونج'] , JSON_UNESCAPED_UNICODE) ,
                'slug'              => json_encode(['en' => 'samsung'  , 'ar' => 'سامسونج' ] , JSON_UNESCAPED_UNICODE) ,
                'image'            =>  "default.png" ,
                'created_at'        => Carbon::now()
            ],[
                'name'              => json_encode(['en' => 'Vivo'  , 'ar' => 'فيفو'] , JSON_UNESCAPED_UNICODE) ,
                'slug'              => json_encode(['en' => 'vivo'  , 'ar' => 'فيفو' ] , JSON_UNESCAPED_UNICODE) ,
                'image'            =>  "default.png" ,
                'created_at'        => Carbon::now()
            ],
            [
                'name'              => json_encode(['en' => 'Xiaomi'  , 'ar' => 'شاومي'] , JSON_UNESCAPED_UNICODE) ,
                'slug'              => json_encode(['en' => 'xiaomi'  , 'ar' => 'شاومي' ] , JSON_UNESCAPED_UNICODE) ,
                'image'            =>  "default.png" ,
                'created_at'        => Carbon::now()
            ],
            [
                'name'              => json_encode(['en' => 'Lenovo'  , 'ar' => 'لينوفو'] , JSON_UNESCAPED_UNICODE) ,
                'slug'              => json_encode(['en' => 'lenovo'  , 'ar' => 'لينوفو' ] , JSON_UNESCAPED_UNICODE) ,
                'image'            =>  "default.png" ,
                'created_at'        => Carbon::now()
            ],
            [
                'name'              => json_encode(['en' => 'Hp'  , 'ar' => 'اتش بي'] , JSON_UNESCAPED_UNICODE) ,
                'slug'              => json_encode(['en' => 'hp'  , 'ar' => 'اتش-بي' ] , JSON_UNESCAPED_UNICODE) ,
                'image'            =>  "default.png" ,
                'created_at'        => Carbon::now()
            ],
            [
                'name'              => json_encode(['en' => 'skin care'  , 'ar' => 'عناية بالجلد'] , JSON_UNESCAPED_UNICODE) ,
                'slug'              => json_encode(['en' => 'skin-care'  , 'ar' => 'عناية-بالجلد' ] , JSON_UNESCAPED_UNICODE) ,
                'image'            =>  "default.png" ,
                'created_at'        => Carbon::now()
            ]

        ]);


    }
}
