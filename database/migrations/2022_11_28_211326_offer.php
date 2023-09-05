<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Offer",function(Blueprint $t){
            $t->increments("id");
            $t->string("offer");
            $t->decimal("amount");
            $t->timestamp("date_start");
            $t->timestamp("date_end")->nullable();
            $t->timestamps();
            $t->timestamp("deleted_at")->nullable();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Offer");
        Schema::enableForeignKeyConstraints();
    }
};
