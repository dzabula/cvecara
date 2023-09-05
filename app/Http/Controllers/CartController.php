<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\City;
use App\Models\Color_Product;
use App\Models\Price;
use App\Models\ProductCart;
use App\Models\Size_Product;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\addCartRequest;
use App\Http\Controllers\ProductsController;
use App\Models\Product;
use Response;



class CartController extends BaseController
{

    public function __construct(){
        parent::__construct();

    }

    public function index(Request  $request)
    {

        try {
            $this->data['city'] = City::all();
            $user = new User();
            if (session()->get("user") != null) {
                $this->data['products'] = $user->ProductsInChart(session()->get("user")->id);
                $this->data['id_cart'] = Cart::where([["id_user",session()->get("user")->id],["id_status_cart",1]])->first()->id;
            }else $this->data['products'] = null;



            if ($request->ajax()) {

                response()->json($this->data['products']);

            } else return view("pages.products.cart", ['data' => $this->data]);

        }catch (\Exception $e){
            \Log::error($e->getMessage());
            response($e->getMessage(),"500");
        }
    }

    function create()
    {
        //
    }

    public function store(addCartRequest $request)
    {
        $id = $request->post("id");
        $statistics_ = new Statistic();
        if($request->session()->has("user")) {
         //   $id_product_size = Size_Product::where("id_product",$id)->first()->id;
          //  $id_product_color = Color_Product::where("id_product",$id)->first()->id;

            $id_user = $request->session()->get("user")->id;
            $user =new User();

            $number = $user->ifExistCart($id_user);

            if(!$number){

                $object = Cart::create([
                    "id_user" => $id_user
                ]);
                $id_cart = $object->id;

            }else{
                $id_cart = Cart::where([["id_user",$id_user],["id_status_cart","<>",0]])->orderBy("created_at","DESC")->first()->id;
            }


            $object = ProductCart::where([["id_product",$id],['id_cart',$id_cart]])->first();

            if($object){
                $product_cart = ProductCart::find($object->id);
                $product_cart->quantity += 1;
                $product_cart->save();
            }else{
                ProductCart::create([
                    "id_cart" => $id_cart,
                    "id_product" => $id,
                    "quantitiy"=> 1
                ]);
            }

            $products = $user->ProductsInChart($id_user);

            $statistics_->SaveAction($id_user,"Dodavanje u korpu");

            return response()->json($products);


        }
        else{

            $obj = Product::where("id",$id)->get()->first();
            $obj->Categories;
            $obj->Price;



            if(count($obj->Offer) > 0){
                $offer = $obj->Offer[0]->amount;
                $obj->price_with_offer = $obj->Price[0]->price - ($obj->Price[0]->price * $offer / 100) ;
            }else{
                $obj->price_with_offer = $obj->Price[0]->price;
            }

          //  $obj->Colors;
           // $obj->Sizes;
            $statistics_->SaveAction(null,"Dodavanje u korpu");
            return response()->json([$obj])->setStatusCode(201);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function ghost(Request $request){
        //All items from local storage are be inserted in data base


        $cart = Cart::create();
        $items = $request->input("items");

        try {
            foreach ($items as $i) {
                if (!is_numeric($i['id']) || !is_numeric($i['id'])) {
                    return response("Proizvodi nisu validni !!!", 400);
                }
                ProductCart::create([
                    "id_cart" => $cart->id,
                    "id_product" => $i['id'],
                    "quantity" => $i['quantity']
                ]);
            }

            return response()->json($cart->id);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return response($e->getMessage(),500);
        }


    }



    public function update(Request $request)
    {
        $id = $request->id;
        $object = ProductCart::find($id);
        if($object->quantity > 1) {
            $object->quantity = $object->quantity - 1;
            $object->save();
        }

    }

    public function destroy(Request  $request)
    {

        try {

            $id_product = $request->input("id");
            $id_user = session()->get("user")->id;

            if ($id_user == null) return response("Niste autorizovani","401");

            $obj_id = Cart::where("id_user", $id_user)
                ->join("product_cart","cart.id","=","product_cart.id_cart")
                ->join("product","product_cart.id_product","=","product.id")
                ->where([["product.id",$id_product],["product_cart.deleted_at",null]])
                ->select("product_cart.id as id")->first()->id;

            $obj_to_destroy = ProductCart::find($obj_id);
            $obj_to_destroy->delete();

            return response()->json("Uspecno izbrisan proizvod");

        }catch (\Exception $e){
            $ticket = rand() . rand();
            \Log::error($e->getMessage()." ticket: " . $ticket);
            return response($obj_id ."---".$e->getMessage(),"500");

//            return response("","500")->json("Doslo je do greske probajete kasnije! (Problem : ".$ticket." )");
        }
    }
}
