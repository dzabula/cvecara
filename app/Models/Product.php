<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;


    //protected $dates = ['deleted_at'];

    protected $table = "product";
    protected $fillable = ['name','id_category','forced',"deleted_at","created_at","updated_at","src"];
    /*protected $attributes = [
        "col" => "[]",
        "siz" => "[]"
    ];*/
    protected $casts = [
        "col" => "array",
        "siz" => "array",
    ];

    public static function GetHistoryOffer($product,$invoice){
        return  DB::table("offer")->join("product_offer","offer.id","=","product_offer.id_offer")->
        where([["product_offer.id_product","=",$product->id],["product_offer.created_at","<",$invoice->created_at]])->
        where(function ($query) use($invoice) {
            $query->orWhere("product_offer.deleted_at",">",$invoice->created_at)
                ->orWhere("product_offer.deleted_at",null);
        })->first();
    }

    public static function GetHistoryPrice($product,$invoice){
        return  DB::table("price")->
        where([["price.id_product","=",$product->id],["price.created_at","<",$invoice->created_at]])->
        where(function ($query) use($invoice) {
            $query->orWhere("price.deleted_at",">",$invoice->created_at)
                ->orWhere("price.deleted_at",null);
        })->first();
    }

    public function ProductCart(){
        return $this->hasMany(ProductCart::class,"id_product","id");
    }

    public function Categories(){
          return $this->belongsTo(Category::class, "id_category","id");
    }


    public function Price(){
        return $this->hasMany(Price::class,"id_product","id")->orderBy("price.created_at")->limit(1);
    }

    public function Colors(){
        return $this->belongsToMany(Color::class,"product_color","id_color","id_product");
    }

    public function Sizes(){
        return $this->belongsToMany(Size::class,"product_size","id_size","id_product");
    }

    public function Offer(){
        return $this->belongsToMany(Offer::class,"product_offer","id_product","id_offer");
    }

    public function ProductOffer(){
        return $this->hasMany(ProductOffer::class,"id_product","id");
    }


    public static function FilterProducts($categories, $min_price,$max_price, $sort = 1,$search_text = ""){

        switch($sort){
            case 1 : $sort = "asc";break;
            case 2 : $sort = "desc";break;
            default: $sort = "asc";
        }

        $arr = Product::whereHas("Categories",function($q) use ($categories){
            $q->whereIn('category.id',$categories);

        })->whereHas("Price",function($q) use ($min_price,$max_price,$sort){
            $q->where('price.price',">=",$min_price);
            $q->where('price.price',"<=",$max_price);

        })
            ->where("product.name","LIKE","%".$search_text ."%")
            ->distinct("product.name")
            ->paginate(9);

        return $arr;
    }

    public static function GetBestSelers(){
        $product = DB::select("SELECT  id_product, SUM(pc.quantity) as sum_quantity
                    FROM product p JOIN product_cart pc ON p.id = pc.id_product JOIN cart c ON pc.id_cart = c.id JOIN invoice i ON c.id =i.id_cart
                    GROUP BY id_product
                    ORDER BY sum_quantity DESC
                    LIMIT 0, 8");

      /*  $product = DB::table("product")->select(["id_product"," (SUM (product_cart.quantity)) as num"])
                join("product_cart","product.id","=","product_cart.id_product")
            ->join("cart","product_cart.id_cart","=","cart.id")
            ->join("invoice","cart.id","=","invoice.id_cart")
            ->where("product.deleted_at",null)
            ->groupBy(["id_product"])->limit(8)->get();
            */

        $res = [];

        foreach ($product as $p){
            array_push($res,$p->id_product);
        }

        $arr = Product::whereIn("id",$res)->get();

        foreach ($arr as $a) {

            $a->price = $a->Price[0]->price;

            $a->Offer;


            if (count($a->Offer) > 0) {

                $a->offer = $a->Offer[0]->offer;
                $a->amount = $a->Offer[0]->amount;
                $a->date_end = $a->Offer[0]->date_end;
                $a->id_product = $a->id;
            }
        }

        return $arr;
    }

    public static function GetOfferProducts(){
        $offer_products = Product::has("Offer")->distinct("id_product")->get();
        foreach ($offer_products as $o){
            $o->price = $o->Price[0]->price;
            $o->offer =  $o->Offer[0]->offer;
            $o->amount =  $o->Offer[0]->amount;
            $o->date_end = $o->Offer[0]->date_end;
            $o->id_product = $o->id;
        }
        return $offer_products;
    }


}
