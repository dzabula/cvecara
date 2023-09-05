<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Product",function(Blueprint $t){
            $t->increments("id");
            $t->string("name");
            $t->integer("id_category")->unsigned()->index();
            $t->boolean("forced")->default(false);
            $t->string("src");
            $t->timestamps();
            $t->timestamp("deleted_at");
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Product");
        Schema::enableForeignKeyConstraints();
    }
};
