<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Cart_status",function(Blueprint $t){
            $t->increments("id");
            $t->string("name");
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Cart_status");
        Schema::enableForeignKeyConstraints();
    }
};
