<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('roles')->insert([
            [
                'name' => json_encode(['en' => 'admin', 'ar' => 'ادمن'], JSON_UNESCAPED_UNICODE),
            ],
        ]);
    }
}
