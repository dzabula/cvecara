<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adress extends Seeder
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
            DB::table("adress")->insert([
                "postalcode" => $faker->numberBetween(10000,99999),
                "adress" => $faker->address,
                "id_city" => rand(DB::table("city")->min("id"),DB::table("city")->max("id"))
            ]);
        }
    }
}
