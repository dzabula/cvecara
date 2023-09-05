<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class offer extends Seeder
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
            $x = 100000;
            $time = time() - $x;
            DB::table("Offer")->insert([
                "offer" => $faker->word(),
                "amount" => rand(2,50),
                "date_start" => date("Y-m-d H:m:s",time()-rand(1,$x)*100),
                "date_end" =>   date("Y-m-d H:m:s",time()+rand(1,$x)*100),
            ]);
        }
    }
}
