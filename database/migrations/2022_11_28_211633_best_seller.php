<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Best_seller",function(Blueprint $t){
            $t->increments("id");
            $t->integer("id_product")->unsigned()->index();
            $t->timestamps();
            $t->timestamp("deleted_at")->nullable();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Best_seller");
        Schema::enableForeignKeyConstraints();
    }
};
