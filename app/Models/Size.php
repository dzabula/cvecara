<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = "size";

    //protected $fillable = ["size"];

    public function Products(){
        return $this->belongsToMany(Product::class,"product_size","id_size","id_product");
    }
}
