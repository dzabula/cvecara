<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends AdminController
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $actions = Action::all();


        if(isset($_GET['date'])) {
//            dd($_GET['date']);
            foreach ($actions as $a) $a->number = Statistic::where([["id_action", $a->id], ["created_at", $_GET['date']]])->count();
        }else foreach ($actions as $a) $a->number = Statistic::where("id_action",$a->id)->count();


        $this->data['actions'] = $actions;

        return view("admin.pages.statistic",['data' => $this->data]);

    }

    public function filter(Request $request){

        $actions = Action::all();

        foreach ($actions as $a) $a->number = Statistic::where([["id_action",$a->id],["created_at",$request->input("date")]])->count();

        $this->data['actions'] = $actions;

        return view("admin.pages.statistic",['data' => $this->data]);


    }


}
