<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->rememberToken();
            // $table->foreignId('current_team_id')->nullable();
            // $table->string('profile_photo_path', 2048)->nullable();

            $table->id();
            $table->string('name',50);
            $table->string('country_code',5)->default('966');
            $table->string('phone',15);
            $table->string('email',50);
            $table->string('password',100);
            $table->string('image', 50)->default('default.png');
            $table->boolean('active')->default(0);
            $table->boolean('is_blocked')->default(0);
            $table->boolean('is_approved')->default(1);
            $table->string('lang', 2)->default('ar');
            $table->boolean('is_notify')->default(true);
            $table->string('code', 10)->nullable();
            $table->timestamp('code_expire')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 10, 8)->nullable();
            $table->string('map_desc', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->decimal('wallet_balance', 9,2)->default(0);
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
