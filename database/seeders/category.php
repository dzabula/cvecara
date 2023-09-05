<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ["Buketi","Rezano cvece", "Saksijsko cvece","Sahrane i pomeni"];
        $subname = [
            ["Lale","Buketi"],
            ["Ljubicice","BUketi"],
            ["Ruze","Buketi"],
            ["Kale","Rezano cvece"],
            ["Hortenzije","Rezano cvece"],
            ["Crvene ruze","Rezano cvece"],
            ["Ljiljan","Rezano cvece"],
            ["Fikusi","Saksijsko cvece"],
            ["Orhideje","Saksijsko cvece"],
            ["Zmbuli","Saksijsko cvece"],
            ["Suze","Sahrane i pomeni"],
            ["Venci","Sahrane i pomeni"]
            ];

        foreach ($name as $n){
                DB::table("category")->insert([
                    "category" => $n
                ]);
        }
        foreach ($subname as $n){
            DB::table("category")->insert([
                "category" => $n[0],
                "id_parent" => DB::table("category")->where("category",$n[1])->select("id")->first()->id
            ]);
        }

    }
}
