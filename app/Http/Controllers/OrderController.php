<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Adress;
use App\Models\City;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.products.order",['data'=>$this->data]);
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
    public function store(OrderRequest $request)
    {

        $id_cart = $request->input("id_cart");
        $email =  $request->input("email");
        $first_name =  $request->input("first_name");
        $last_name =  $request->input("last_name");
        $phone =  $request->input("phone");
        $id_adress = null;

        if($request->input("delivery") == "dostava"){
            $adress = $request->input("adress");
            $id_city =  $request->input("city");
            $postalcode =  $request->input("postalcode");
            try {
                $adress_obj = Adress::Create([
                    "adress" => $adress,
                    "id_city" => $id_city,
                    "postalcode" => $postalcode
                ]);

                $id_adress = $adress_obj->id;
            }catch (\Exception $e){
                \Log::error($e->getMessage());
                return back()->with("server_error",$e->getMessage());
            }

        }

        try{

        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return back()->with("server_error",$e->getMessage());
        }





       // return view("pages.products.cart",['data' => $this->data]);
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
