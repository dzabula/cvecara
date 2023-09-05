<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("Log_action",function(Blueprint $t){
            $t->increments("id");
            $t->string("operation");
            $t->string("description");
            $t->integer("id_user")->index()->nullable();
            $t->timestamps();

            $t->timestamp("deleted_at")->nullable();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("Log_action");
        Schema::enableForeignKeyConstraints();
    }
};
