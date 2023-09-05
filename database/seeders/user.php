<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=1;$i<21;$i++){
            DB::table("user")->insert([
                "first_name" => $faker->firstName,
                "last_name" => $faker->lastName,
                "email" => $faker->email,
                "gender" => "M",
                "phone" => rand(1000000,9999999),
                "password" => $faker->password(8,20),
                "active" => rand(0,1),
                "activation_link" => md5($faker->word.rand(0,99999)),
                "change_password" => md5($faker->word.rand(0,999999)),
                "id_adress" => rand(DB::table("adress")->min("id"),DB::table("adress")->max("id")),
                "id_role" => rand(DB::table("role")->min("id"),DB::table("role")->max("id"))
            ]);
        }
    }
}
