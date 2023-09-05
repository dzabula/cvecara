<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cupon extends Seeder
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
            DB::table("Cupon")->insert([
                "cupon" => rand(100000000,1000000000000).$faker->word,
                "status" => rand(0,1)
              ]);
        }
    }
}
