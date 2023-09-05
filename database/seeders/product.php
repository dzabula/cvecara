<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product extends Seeder
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
            DB::table("Product")->insert([
                "name" => $faker->word,
                "id_category" => rand(DB::table("category")->where("id_parent","<>",null)->min("id"),DB::table("category")->where("id_parent","<>",null)->max("id")),
                "forced" => rand(0,1),
                "src"=> "products/product_placeholder_square_medium.jpg"
            ]);
        }
    }
}
