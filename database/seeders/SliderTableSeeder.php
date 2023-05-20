<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderTableSeeder extends Seeder {

    public function run() {

        $faker = Faker::create('ar_SA');
        $sliders = [];

        for ($i = 0; $i < 10; $i++) {
            $sliders[] = [
                'title'       => json_encode(['en' => "slider$i", 'ar' => "$i سليدر"], JSON_UNESCAPED_UNICODE),
                'description' => json_encode(['en' => "description$i", 'ar' => "$i وصف"], JSON_UNESCAPED_UNICODE),
                'image'       => "default.png",
                'status'      => rand(0, 1),
                'created_at'  => Carbon::now(),
            ];
        }
        DB::table('sliders')->insert($sliders);

    }
}
