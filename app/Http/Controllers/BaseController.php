<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use App\Models\User;



class BaseController extends Controller
{
    protected  $data = [];

    public function __construct(){

        $model_categories = new Category();
        $this->data['categories'] = Category::all();
        $this->data['categories_obj'] = $model_categories;
        $this->data['cities'] = City::all();

        if(session()->has("user") != null){
            $user = new User();
            $this->data['cart'] = $user->ProductsInChart(session()->get("user")->id);
        


        }
    }

}
