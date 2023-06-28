<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder {

    public function run() {

        $faker    = Faker::create('ar_SA');
        $products = [];

        $discount_price = [rand(90, 250) , null];
        for ($i = 0; $i < 10; $i++) {
            $products[] = [
                'name'              => json_encode(['en' => "product$i", 'ar' => "$i منتج"], JSON_UNESCAPED_UNICODE),
                'slug'              => json_encode(['en' => "slug$i", 'ar' => "$i سلج"], JSON_UNESCAPED_UNICODE),
                'code'              => random_int(0, 12300),
                "brand_id"          => rand(1, 8),
                "category_id"       => rand(1, 12),
                "subcategory_id"    => rand(1, 12),
                "subsubcategory_id" => rand(1, 12),
                "qty"               => rand(1, 20),
                "tags"              => json_encode(['en' => "tags$i", 'ar' => "$i تاج"], JSON_UNESCAPED_UNICODE),
                "size"              => json_encode(['en' => "size$i", 'ar' => "$i حجم"], JSON_UNESCAPED_UNICODE),
                "color"             => json_encode(['en' => "color$i", 'ar' => "$i لون"], JSON_UNESCAPED_UNICODE),
                "selling_price"     => rand(100, 300),
                "discount_price"    => $discount_price[rand(0 , 1)],
                "short_desc"        => json_encode(['en' => $faker->sentence(), 'ar' => $faker->sentence()], JSON_UNESCAPED_UNICODE),
                "long_desc"         => json_encode(['en' => $faker->realText, 'ar' => $faker->realText], JSON_UNESCAPED_UNICODE),
                // "product_thambnail" => "default.png",
                "hot_deals"         => rand(0, 1),
                "featured"          => rand(0, 1),
                "special_offer"     => rand(0, 1),
                "special_deals"     => rand(0, 1),
                'status'            => rand(0, 1),
                'created_at'        => Carbon::now(),
            ];
        }
        DB::table('products')->insert($products);

    }
}
