<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Cart",function(Blueprint $t){
            $t->increments("id");
            $t->integer("id_user")->index();
            $t->timestamps();
            $t->timestamp("deleted_at")->nullable();
            $t->integer("id_status_cart")->index();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Cart");
        Schema::enableForeignKeyConstraints();
    }
};
