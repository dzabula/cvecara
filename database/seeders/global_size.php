<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class global_size extends Seeder
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
            DB::table("Global_size")->insert([
                "size" => strtoupper(substr($faker->word,0,1))
            ]);
        }
    }
}
