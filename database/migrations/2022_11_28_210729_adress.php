<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Adress",function(Blueprint $t){
            $t->increments("id");
            $t->integer("postalcode");
            $t->string("adress");
            $t->integer("id_city")->index();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Adress");
        Schema::enableForeignKeyConstraints();
    }
};
