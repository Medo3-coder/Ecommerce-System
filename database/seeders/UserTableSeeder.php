<?php
namespace Database\Seeders;

use DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run() {

        $faker = Faker::create('ar_SA');
        $users = [];
        for ($i = 0; $i < 100; $i++) {
            $users[] = [
                'name'       => $faker->name,
                'phone'      => "515896411$i",
                'email'      => $faker->unique()->email,
                'password'   => 123456,
                'is_blocked' => rand(0, 1),
                'active'     => rand(0, 1),
            ];
        }

        DB::table('users')->insert($users);
    }
}
