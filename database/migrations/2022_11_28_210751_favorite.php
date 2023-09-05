<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Favorite",function(Blueprint $t){
            $t->increments("id");
            $t->integer("id_product")->index();
            $t->integer("id_user")->index();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Favorite");
        Schema::enableForeignKeyConstraints();
    }
};
