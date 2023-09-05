<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Product_offer",function(Blueprint $t){
            $t->increments("id");
            $t->integer("id_product")->index();
            $t->integer("id_offer")->index();
            $t->timestamps();
            $t->timestamp("deleted_at")->nullable();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Product_offer");
        Schema::enableForeignKeyConstraints();
    }
};
