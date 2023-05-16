<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('avatar', 50)->nullable();
            $table->integer('role_id')->default(0);
            $table->boolean('is_blocked')->default(0);
            $table->boolean('is_notify')->default(true);
            $table->timestamps();
        });


        Admin::create([
            'name'     => 'Manager',
            'email'    => 'admin@info.com',
            'phone'    => '0555105813',
            'password' => 123456,
            'role_id'  => 1,
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
