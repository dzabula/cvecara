<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Category",function(Blueprint $t){
            $t->increments("id");
            $t->string("category");
            $t->integer("id_parent")->index()->nullable();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Category");
        Schema::enableForeignKeyConstraints();
    }
};
