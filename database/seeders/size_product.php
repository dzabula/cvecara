<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class size_product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        for($i=1;$i<count(DB::table("product")->get())*2;$i++){
            DB::table("size_product")->insert([
                "id_size" => rand(DB::table("size")->min("id"),DB::table("size")->max("id")),
                "id_product" => rand(DB::table("product")->min("id"),DB::table("product")->max("id"))
            ]);
        }

    }
}
