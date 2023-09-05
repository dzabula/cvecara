<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;

class ProductsAdminController extends AdminController
{
    public function  __construct()
    {
        parent::__construct();
        $this->data["all_categories"] = Category::all();
        $this->data['all_offers'] = Offer::all();
        $this->data['num_products'] = Product::count();
    }

    public function index()
    {
        $string = "";
        if(isset($_GET['keyword'])) $string = $_GET['keyword'];

        $productModel = new Product();
        $products  = $productModel->withTrashed()->where("name","like","%".$string."%")->orderBy("created_at","desc")->paginate(10);
        $this->data['products'] = $products;

        return view("admin.pages.products",['data' => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!isset($this->data['status'])) {
            $this->data['status'] = 2;
        }
        return view("admin.pages.createProduct",['data' => $this->data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $name = $request->input("name");
            $price = $request->input("price");
            $category = $request->input("category");
            $offer = $request->input("offer");
            $img = $request->file("image");
            //dd([
              //  $name,$price,$category,$offer,$img
            //]);
            try{
                DB::beginTransaction();

                $name_img = time() . rand() . "." . $img->extension();
                $src = "upload/" . $name_img;
                $img->move('asset/img/upload/',$name_img);
                $product = Product::create([
                    "name"=> $name,
                    "forced" => 1,
                    "id_category" => $category,
                    "created_at" => time(),
                    "src" => $src
                ]);

                Price::create([
                    "price" => $price,
                    "id_product" => $product->id
                ]);



                if($offer > 0){
                    ProductOffer::create([
                        "id_offer" => $offer,
                        "id_product" => $product->id,
                        "created_at" => time()

                    ]);
                }

                DB::commit();
                $this->data['status'] = 1;
                return view("admin.pages.createProduct",['data' => $this->data]);
                 //return back()->with("success","Uspesno kreiran proizvod");
            }catch (\Exception $e){
                DB::rollBack();
                $this->data['status'] = 0;
               // dd($e->getMessage());
                \Log::error($e->getMessage());
                return view("admin.pages.createProduct",['data' => $this->data]);
                //return back()->with("error","Trenutno nije moguce dodati proizvod, kontaktirajte administratora");
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $productModel = new Product();

        $this->data["product"]  = $productModel->withTrashed()->find($id);

        if($this->data['product'] == null) return "Nazalost prozivod nepostoji ";

        return view("admin.pages.single-product",['data' => $this->data]);
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
    public function update(UpdateProductRequest $request)
    {

        try {

            $id = $request->input("id");
            $name = $request->input("name");
            $price = $request->input("price");
            $category = $request->input("category");
            $offer = $request->input("offer");


            $img = $request->file("image");

            DB::beginTransaction();
            if($img) {
                $name_img = time() . rand() . "." . $img->extension();
                $src = "upload/" . $name_img;
                $img->move('asset/img/upload/',$name_img);

            }else{
                $src = Product::withTrashed()->find($id)->src;
            }

            $old_price = Price::where("id_product",$id)->first();
            if($price != $old_price->price) {
                $old_price->delete();

                Price::create([
                    "price" => $price,
                    "id_product" => $id,
                    "created_at" => time()
                ]);
            }


            $pf = ProductOffer::where("id_product",$id)->first();

            if($pf != null && $pf->id != $offer) {
                $pf->delete();
                if($offer > 0) {
                    ProductOffer::create([
                        "id_offer" => $offer,
                        "id_product" => $id,
                        "created_at" => time()
                    ]);
                }
            }


            $new_product = Product::withTrashed()->find($id);
            $new_product->name = $name;
            $new_product->id_category = $category;
            $new_product->src = $src;
            $new_product->updated_at = time();
            $new_product->save();
            DB::commit();
            return back();
        }catch(\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $this->data['notification'] = "Doslo je do greske proverite da li su uneti podaci ispravni";
            $this->data['notification'] = $e->getMessage();
            return view("pages.notification",["data" => $this->data]);
        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!is_numeric($request->input("id"))) return response("Wrong params",401);
        try {
            Product::destroy($request->input("id"));
            if($request->ajax())
                return response()->json("okej");
            else{
                return back();
            }
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            if($request->ajax())
                return response($e->getMessage(),500);
            else{
                return back();
            }
        }
    }

    public function redelete(Request  $request){
        if(!is_numeric($request->input("id"))) return response("Wrong params",401);
        try {
            $product = Product::withTrashed()->where("id",$request->input("id"))->first();
            $product->deleted_at = null;
            $product->save();
            if($request->ajax())
                return response()->json("okej");
            else{
               return back();
                // return $this->show($request->input("id"));
            }
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            if($request->ajax())
                return response($e->getMessage(),500);
            else{
               return back();
                // return $this->show($request->input("id"));
            }
        }
    }
}
