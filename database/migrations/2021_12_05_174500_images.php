<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Images extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("images",function(Blueprint $t){
            $t->increments("id");
            $t->string("src")->unique();
            $t->string("alt")->default(true);
            $t->integer("id_product")->unsigned()->index();
            $t->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Images");
        Schema::enableForeignKeyConstraints();
    }
}
