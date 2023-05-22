<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name');
            // $table->string('product_name_en');
            // $table->string('product_name_hin');
            // $table->string('product_name_ar');
            $table->string('slug');
            $table->string('image');
            // $table->string('product_slug_en');
            // $table->string('product_slug_hin');
            // $table->string('product_slug_ar');
            $table->string('code');
            $table->string('qty');
            $table->string('tags');
            // $table->string('product_tags_en');
            // $table->string('product_tags_hin');
            // $table->string('product_tags_ar');
            $table->string('size')->nullable();
            // $table->string('product_size_en')->nullable();
            // $table->string('product_size_hin')->nullable();
            // $table->string('product_size_ar')->nullable();
            $table->string('color')->nullable();
            // $table->string('product_color_en');
            // $table->string('product_color_hin');
            // $table->string('product_color_ar');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_desc')->nullable();
            // $table->string('short_descp_en');
            // $table->string('short_descp_hin');
            // $table->string('short_descp_ar');
            $table->longText('long_desc');
            // $table->string('long_descp_hin');
            // $table->string('long_descp_ar');
            $table->string('product_thambnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
