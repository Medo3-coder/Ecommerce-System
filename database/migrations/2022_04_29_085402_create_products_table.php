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
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_hin');
            $table->string('product_name_ar');
            $table->string('product_slug_en');
            $table->string('product_slug_hin');
            $table->string('product_slug_ar');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_hin');
            $table->string('product_tags_ar');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_hin')->nullable();
            $table->string('product_size_ar')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_hin');
            $table->string('product_color_ar');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_descp_en');
            $table->string('short_descp_hin');
            $table->string('short_descp_ar');
            $table->string('long_descp_en');
            $table->string('long_descp_hin');
            $table->string('long_descp_ar');
            $table->string('product_thambnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();


            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('subsubcategory_id')->references('id')->on('sub_sub_categories')->onDelete('cascade');

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
