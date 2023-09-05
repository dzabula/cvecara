<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Cupon",function(Blueprint $t){
            $t->increments("id");
            $t->string("cupon")->unique();
            $t->int("offer");
            $t->int("status")->default(1); // 1 active one, 0 expired, 2 active more times
            $t->timestamps();
            $t->timestamp("deleted_at")->nullable();

        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Cupon");
        Schema::enableForeignKeyConstraints();
    }
};
