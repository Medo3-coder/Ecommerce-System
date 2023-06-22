<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder {

    public function run() {

        $faker = Faker::create('ar_SA');
        $users = [];
        for ($i = 0; $i < 20; $i++) {
            $users[] = [
                'name'       => $faker->name,
                'phone'      => "515896411$i",
                'email'      => $faker->unique()->email,
                'password'   => Hash::make($faker->password),
                'is_blocked' => rand(0, 1),
                'active'     => rand(0, 1),
            ];
        }

        DB::table('users')->insert($users);
    }
}
