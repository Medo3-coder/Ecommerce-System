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
            $table->foreignId('subcategory_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('subsubcategory_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            // $table->string('image');
            $table->string('code');
            $table->string('qty');
            $table->string('tags');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('long_desc');
            $table->string('product_thambnail')->default('default-product.jpg');
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
