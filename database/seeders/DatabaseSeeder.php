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

        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(CouponTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ShippingDivisionTableSeeder::class);
        $this->call(ShippingDistrictTableSeeder::class);
        $this->call(ShippingStatesTableSeeder::class);

    }
}
