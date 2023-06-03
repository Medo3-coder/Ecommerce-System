<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingDivisionTableSeeder extends Seeder {

    public function run() {

        $faker = Faker::create('ar_SA');
        $divisions = [];
        for ($i = 0; $i < 10; $i++) {
            $divisions[] = [
                'name'       => json_encode(['en' => $faker->name, 'ar' => $faker->name], JSON_UNESCAPED_UNICODE),

            ];
        }

        DB::table('ship_divisions')->insert($divisions);
    }
}
