<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Statistic",function(Blueprint $t){
            $t->increments("id");
            $t->string("page");
            $t->timestamps();
            $t->timestamp("deleted_at")->nullable();

        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Statistic");
        Schema::enableForeignKeyConstraints();
    }
};
