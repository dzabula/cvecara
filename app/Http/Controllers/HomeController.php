<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\City;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class HomeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        parent::__construct();
        $productModel = new Product();
        $this->data['max-offer'] = Offer::orderBy("amount","desc")->first()->amount;
        $this->data['offer_products'] =$productModel->GetOfferProducts();
        $this->data['best_seler'] = $productModel->GetBestSelers();

    }
    public function index()
    {
       if(session()->get("user") != null){
            $user = new User();
            $this->data['cart'] =$user->ProductsInChart(session()->get("user")->id);


        }

        return view("pages.home",['data'=> $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
