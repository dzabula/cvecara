<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class color extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['black',"red","white","rose"];
        $faker = \Faker\Factory::create();
        for($i=1;$i<count($colors);$i++){
            DB::table("Color")->insert([
                "color" => $colors[$i],
            ]);
        }
    }
}
