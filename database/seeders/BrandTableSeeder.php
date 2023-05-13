<?php
namespace Database\Seeders;
use App\Models\Brand;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create('ar_SA');
        $data  = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name'  => json_encode(['en' => $faker->name, 'ar' => $faker->name], JSON_UNESCAPED_UNICODE),
                'slug'  => $faker->slug(3),
                'image' => 'default.png',
            ];
        }

        Brand::insert($data);

    }
}
