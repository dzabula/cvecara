<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class color_product extends Seeder
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
            DB::table("color_product")->insert([
                "id_color" => rand(DB::table("color")->min("id"),DB::table("color")->max("id")),
                "id_product" => rand(DB::table("product")->min("id"),DB::table("product")->max("id"))
            ]);
        }
    }
}
