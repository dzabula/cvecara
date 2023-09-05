<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("User",function(Blueprint $t){
            $t->increments("id");
            $t->string("first_name");
            $t->string("last_name");
            $t->char("gender");
            $t->string("email");
            $t->string("password");
            $t->string("activation_link")->unique();
            $t->string("change_password")->unique();
            $t->boolean("active")->default(false);
            $t->string("phone");
            $t->integer("id_adress")->unsigned()->index();
            $t->integer("id_role")->unsigned()->index()->default(1);
            $t->timestamps();
            $t->timestamp("deleted_at")->nullable();
        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("User");
        Schema::enableForeignKeyConstraints();
    }
};
