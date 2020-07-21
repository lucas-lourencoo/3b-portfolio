<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
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
            $table->string('name');
            $table->integer('code');
            $table->float('price');
            $table->float('gross_weight')->nullable();
            $table->float('weight');
            $table->string('description');
            $table->string('recommendation')->nullable();
            $table->string('segment');
            $table->string('animal')->nullable();
            $table->string('image');
            $table->string('image2')->nullable();
            $table->integer('brand')->unsigned();
            $table->integer('category')->unsigned();
            $table->foreign('brand')->references('id')->on('brands');
            $table->foreign('category')->references('id')->on('categories');
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
        Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_category_foreign');
            $table->dropForeign('products_brand_foreign');
		});
		Schema::dropIfExists('products');
    }
}
