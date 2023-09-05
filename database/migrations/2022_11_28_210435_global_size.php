<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Global_size",function(Blueprint $t){
            $t->increments("id");
            $t->string("size");
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Global_size");
        Schema::enableForeignKeyConstraints();
    }
};
