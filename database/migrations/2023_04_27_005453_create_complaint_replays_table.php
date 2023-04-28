<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintReplaysTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('complaint_replays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->references('id')->on('complaints')->onDelete('cascade');
            $table->text('replay');
            $table->integer('replayer_id')->unsigned();
            $table->string('replayer_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('complaint_replays');
    }
}
