<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Invoice",function(Blueprint $t){
            $t->increments("id");
            $t->integer("id_cart")->index();
            $t->timestamps();
            $t->timestamp("deleted_at")->nullable();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Invoice");
        Schema::enableForeignKeyConstraints();
    }
};
