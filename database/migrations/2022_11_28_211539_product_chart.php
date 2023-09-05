<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Product_cart",function(Blueprint $t){
            $t->increments("id");
            $t->integer("id_cart")->unsigned()->index();
            $t->integer("id_product")->unsigned()->index();
            $t->integer("id_product_color")->unsigned()->index();
            $t->integer("id_product_size")->unsigned()->index();
            $t->integer("quantity")->default(1);
            $t->timestamps();
            $t->timestamp("deleted_at")->nullable();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Product_cart");
        Schema::enableForeignKeyConstraints();
    }
};
