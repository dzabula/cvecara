<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory;
   // use SoftDeletes;
    protected  $table="color";
    protected $fillable = ['color'];
    public $timestamps=false;

    public function Products(){
      return   $this->belongsToMany(Product::class,"product_color","id_color","id_product");
    }
}
