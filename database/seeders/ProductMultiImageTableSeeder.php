<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductMultiImageTableSeeder extends Seeder {

    public function run() {


        for ($i = 0; $i < 10; $i++) {
            $mutiImage[] = [
                'product_id' => rand(1, 10),
                'image'     => "default.jpg",
                'created_at' => Carbon::now(),
            ];
        }
        DB::table('product_images')->insert($mutiImage);

    }
}
