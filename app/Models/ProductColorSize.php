<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductColorSize extends Model
{
    use HasFactory;
   // use SoftDeletes;
    //protected $dates = ['deleted_at'];
    protected $table = "product_color_size";


    public function Product(){
        return $this->belongsTo(Product::class,"id_product","id");
    }

    public function ProductSize(){
        return $this->belongsTo(ProductSize::class,"id_product_size","id");
    }

    public function ProductColor(){
        return $this->belongsTo(ProductColor::class,"id_product_color","id");
    }





        //  dd($arr);

/*
 * ->whereHas("Categories",function($q) use ($categories){
            $q->whereIn('category.id',$categories);

        })*/

}
