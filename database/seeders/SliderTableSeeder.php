<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderTableSeeder extends Seeder {

    public function run() {

        $faker = Faker::create('ar_SA');

        DB::table('sliders')->insert([
            [
                'title'       => json_encode(['en' => $faker->name, 'ar' => $faker->name], JSON_UNESCAPED_UNICODE),
                'description' => json_encode(['en' => $faker->sentence, 'ar' => $faker->sentence], JSON_UNESCAPED_UNICODE),
                'image'       => "slider1.jpg",
                'status'      => rand(0, 1),
                'created_at'  => Carbon::now(),
            ],
            [
                'title'       => json_encode(['en' => $faker->name, 'ar' => $faker->name], JSON_UNESCAPED_UNICODE),
                'description' => json_encode(['en' => $faker->sentence, 'ar' => $faker->sentence], JSON_UNESCAPED_UNICODE),
                'image'       => "slider2.jpg",
                'status'      => rand(0, 1),
                'created_at'  => Carbon::now(),
            ],
            [
                'title'       => json_encode(['en' => $faker->name, 'ar' => $faker->name], JSON_UNESCAPED_UNICODE),
                'description' => json_encode(['en' => $faker->sentence, 'ar' => $faker->sentence], JSON_UNESCAPED_UNICODE),
                'image'       => "slider3.jpg",
                'status'      => rand(0, 1),
                'created_at'  => Carbon::now(),
            ],
            [
                'title'       => json_encode(['en' => $faker->name, 'ar' => $faker->name], JSON_UNESCAPED_UNICODE),
                'description' => json_encode(['en' => $faker->sentence, 'ar' => $faker->sentence], JSON_UNESCAPED_UNICODE),
                'image'       => "slider4.jpg",
                'status'      => rand(0, 1),
                'created_at'  => Carbon::now(),
            ],
        ]);

    }
}
