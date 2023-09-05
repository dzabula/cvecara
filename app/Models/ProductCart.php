<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCart extends Model
{
    use HasFactory;
    //use SoftDeletes;

  //  protected $dates = ['deleted_at'];
    protected $fillable = ['id_cart',"id_product","quantity"];
    protected $table ="product_cart";
    public $timestamps = false;

    public function Product(){
       return  $this->belongsTo(Product::class,"id_product","id");
    }




}
