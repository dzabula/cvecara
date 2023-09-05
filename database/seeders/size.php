<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class size extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = ["malo", "srednje", "veliko"];
        $faker = \Faker\Factory::create();
        for ($i = 1; $i < count($size); $i++) {
            DB::table("size")->insert([
                "size" => $size[$i],
            ]);
        }
    }
}
