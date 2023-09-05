<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('User', function (Blueprint $table) {
            $table->foreign('id_role')->references('id')->on('Role');
        });
        Schema::table('User', function (Blueprint $table) {
            $table->foreign('id_adress')->references('id')->on('Adress');
        });
        Schema::table('Product', function (Blueprint $table) {
            $table->foreign('id_category')->references('id')->on('Category');
         });
        Schema::table('Images', function (Blueprint $table) {
            $table->foreign('id_product')->references('id')->on('Product');
        });
        Schema::table('size_product', function (Blueprint $table) {
            $table->foreign('id_product')->references('id')->on('Product');
        });
        Schema::table('size_product', function (Blueprint $table) {
            $table->foreign('id_size')->references('id')->on('size');
        });
        Schema::table('color_product', function (Blueprint $table) {
            $table->foreign('id_color')->references('id')->on('Color');
        });
        Schema::table('color_product', function (Blueprint $table) {
            $table->foreign('id_product')->references('id')->on('Product');
        });
        Schema::table('price', function (Blueprint $table) {
            $table->foreign('id_product')->references('id')->on('Product');
        });
        Schema::table('product_cart', function (Blueprint $table) {
            $table->foreign('id_product_color')->references('id')->on('color_product');
        });
        Schema::table('product_cart', function (Blueprint $table) {
            $table->foreign('id_product_size')->references('id')->on('size_product');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
