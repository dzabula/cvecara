<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create("Role",function(Blueprint $t){
            $t->increments("id");
            $t->string("role")->unique();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Role");
        Schema::enableForeignKeyConstraints();
    }
};
