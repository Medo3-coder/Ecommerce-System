<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Admin::factory()->create();

        $this->call(CategoryTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(CouponTableSeeder::class);

    }
}
