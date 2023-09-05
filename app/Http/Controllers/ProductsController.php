<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests\FilterRequest;
use App\Models\Color;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductsController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }
    public function index($single_category = null)
    {
        $colors = new Color();
        $sizes = new Size();
        $products = new Product();
        $this->data['colors'] = $colors->all();
        $this->data['sizes'] = $sizes->all();
        $this->data['products'] = $products->limit(18)->get();
        $this->data['products_num'] = count($products->all());
        $this->data['max-price'] = Price::where("deleted_at",null)->orderBy('price', 'desc')->first()->price + 1;

        return view("pages.products.index", ['data' => $this->data]);
    }

    public function filter($singleCategory,$categories_,$sizes_,$colors_,$maxPrice,$minPrice, $sort,$search_text = ""){


        try {

            $categories = @array_filter(explode("-",$categories_), "is_numeric");

            $max_price = (float)$maxPrice;
            $min_price = (float)$minPrice;
        }catch (\Exception $e) {
            response()->json("Doslo je do greske");
        }

        if(isset($singleCategory)) $this->data['single-category'] = $singleCategory;
        else $this->data['single-category'] = 0;


        if($categories[0] == 0 && count($categories) == 1){
            $categories = [];
            $x = Category::where("id_parent","<>",null)->get();

            foreach ($x as $e){
                array_push($categories, $e->id);
            }

        }

        if($max_price <  $min_price) {

            $max_price = PHP_INT_MAX;
            $min_price =0;
        }



        try {
            $productModel = new Product();
            $arr = $productModel->FilterProducts($categories, $min_price,$max_price,$sort,$search_text);


        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            return  response()->json($exception->getMessage());
        }
        $items = $arr->items();

        foreach ($items as $a ){

            $a->Categories;
            $a->Offer;
            $a->price = $a->Price[0]->price;
            if(count($a->Offer)>0){

                $a->offer = $a->Offer[0]->offer;
                $a->amount = $a->Offer[0]->amount;
                $a->date_end = $a->Offer[0]->date_end;
            }else $a->amount = 0;
        }
        $arr->items($items);

        if($singleCategory != 0){
            $this->data['colors'] = Color::all();
            $this->data['sizes'] = Size::all();
            $this->data['products'] = $arr;
            $this->data['products_num'] = $arr->total();
            $this->data['max-price'] =  Price::where("price.deleted_at",null)->orderBy('price', 'desc')->first()->price + 1;;
            return view("pages.products.index", ['data' => $this->data]);
        }else {
            return response()->json($arr);
        }
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $text = $request->input("search-text");

        $arr = Product::join("price","price.id_product","=","product.id")
            ->where([["price.deleted_at",null],["product.name","LIKE","%".$text ."%"]])
            ->paginate(9);

        foreach ($arr as $a ){
          //  $a->Colors;
           // $a->Sizes;
            if($a->id_product != null && $a->id_product > 0) $a->id = $a->id_product;
            $a->Categories;
            $a->Offer;
            if(count($a->Offer)>0){

                $a->offer = $a->Offer[0]->offer;
                $a->amount = $a->Offer[0]->amount;
                $a->date_end = $a->Offer[0]->date_end;
            }
        }


        $this->data['colors'] = Color::all();
        $this->data['sizes'] = Size::all();
        $this->data['products'] = $arr;
        $this->data['products_num'] = $arr->total();
        $this->data['max-price'] =  Price::where("price.deleted_at",null)->orderBy('price', 'desc')->first()->price + 1;;

        return view("pages.products.index", ['data' => $this->data]);


    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
