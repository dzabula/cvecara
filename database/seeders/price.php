<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class price extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=1;$i<DB::table("Product")->count("id")*3;$i++){

            DB::table("Price")->insert([
                "price" => rand(500,25000),
                "id_product" => rand(DB::table("product")->min("id"),DB::table("product")->max("id"))
            ]);
        }
    }
}
