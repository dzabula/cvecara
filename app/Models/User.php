<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $table ="user";
    protected $fillable = [
    'email',
    'active',
    'password',
    'gender',
    'first_name',
        'phone',
    'last_name',
    'active',
    'activation_link',
    'id_adress',
    'id_role',
    'change_password'

    ];

    public function Role(){
        return $this->belongsTo(Role::class,"id_role","id");
    }

    function Carts()
    {
        return $this->hasMany(Cart::class, "id_user", "id")->where("id_status_cart",1);

    }



    function Adress(){
        return $this->belongsTo(Adress::class,"id_adress","id");
    }

    public function AllUsers(){
        return User::all();
    }

    function ifExistCart($id_user){
      return   DB::table("cart")->where([["id_user",$id_user],['id_status_cart',"<>",2]])->count("id_user");
    }

    function ProductsInChart($id){

        if(Cart::where([["id_user",$id],["id_status_cart",1]])->count() == 0) return [];

        $ob = User::find($id);


        $ob = $ob->Carts;
        if(!count($ob)){
            return [];
        }


        $arr = $ob[0]->ProductsCarts;
        $res = [];


       foreach ($arr as $i => $o) {
           $o->Product->quantity = $o->quantity;
           $o->Product->id_cart_product = $o->id;
            array_push($res,$o->Product);
        }

       foreach ($res as $i => $o) {

            $o->Categories;
            $o->Price;
            if(count($o->Offer) > 0){
                $offer = $o->Offer[0]->amount;
                $o->price_with_offer = $o->Price[0]->price - ($o->Price[0]->price * $offer / 100) ;
            }else{
                $o->price_with_offer = $o->Price[0]->price;
            }

        }


        return $res;

    }

}
