<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Adress;
use App\Models\Statistic;
use App\Models\Cart;
use App\Models\Cupon;
use App\Models\Invoice;
use App\Models\ProductCart;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Mail;
use App\Mail\InvoiceMail;

class InvoiceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $id_cart = $request->input("id_cart");
        $cupon = $request->input("cupon");

        if($id_cart == null || $id_cart == ""){
            $cart =  Cart::where("id_user",session()->get("user")->id)->first();
            $id_cart = $cart->id;
        }else{
            $cart =  Cart::where("id",$id_cart)->first();
        }


        $obj_cupon = Cupon::where([["cupon",$cupon],['status',"<>",0]])->first();


        $id_cupon = null;
        $offer_by_cupon = 0;
        if($obj_cupon != null){
            $id_cupon = $obj_cupon->id;
            $offer_by_cupon = $obj_cupon->offer;
        }

        //Izracunavanje ukupne sume poruzbine
        $total = 0;
        $all_products = $cart->Products;
     //   dd($all_products);
        foreach ($all_products as $product){
            $price =(float)$product->Price[0]->price;
            $offer = $product->Offer;

            $quantity = $product->ProductCart->where("id_cart",$id_cart)->first()->quantity;

            if(count($offer) > 0){
                $off = $offer[0]->amount;
                $price = $price - ($price * $off /100);
            }

            $price = $price - ($price * $offer_by_cupon /100);

            $total += $price * $quantity;
        }


        //Kraj izracunavanja

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
                dd($e->getMessage());

                return back()->with("server_error",$e->getMessage());
            }

        }






        try{
            $serial_number = time() ."-".rand()."-".time() * rand();
            $i = Invoice::create([
                'id_cart' => $id_cart,
                "id_adress" => $id_adress,
                "id_invoice_status" => 1,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "phone" => $phone,
                "email" => $email,
                "serial_number" => $serial_number,
                "id_cupon" => $id_cupon,
                "total_price" => $total
            ]);

            $cart = Cart::find($id_cart);
            $cart->id_status_cart = 2;
            $cart->save();

            $user = $cart->User;
            if($user != null) $id_user = $user->id;
            else $id_user = null;

            $statisticModel = new Statistic();
            $statisticModel->SaveAction($id_user,"Kreiranje porudzbine");


            // Slaneje emaila musteriji o uspesno obavljenoji kupovini i detaljima porudzbine

            try{
                Mail::to($email)->send(new InvoiceMail($first_name, $serial_number, $total));

            }catch(\Exception $e){
                echo json_encode("Zabolo je kod slanja eamila za invoice. Invoice Controler > Store > 171. Greska je:". $e->getMessage());
                exit;
            }

        }catch (\Exception $e){
            \Log::error($e->getMessage());
            dd($e->getMessage());
            return back()->with("server_error",$e->getMessage());
        }

        if($id_cupon != null && $obj_cupon->status != 2){
            $update = Cupon::find($id_cupon);
            $update->status = 0;
            $update->save();
        }


        $this->data['notification'] = "Vasa porudzbina je uspesno kreirana. Detalji porudzbine su poslati na vas email. ID porudzbine je: ".$serial_number;
        return view("pages.notification",['data' => $this->data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
