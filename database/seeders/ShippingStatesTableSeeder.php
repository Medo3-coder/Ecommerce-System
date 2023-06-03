<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingStatesTableSeeder  extends Seeder {

    public function run() {

        $faker = Faker::create('ar_SA');
        $states = [];
        for ($i = 0; $i < 10; $i++) {
            $states[] = [
                'division_id'   => rand(1,10),
                'district_id'   => rand(1,10),
                'name'       => json_encode(['en' => $faker->name, 'ar' => $faker->name], JSON_UNESCAPED_UNICODE),

            ];
        }

        DB::table('ship_states')->insert($states);
    }
}
