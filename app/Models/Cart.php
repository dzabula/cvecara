<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "cart";
    protected $fillable = ["id_user","id_status_cart","created_at","updated_at","deleted_at"];


    public function ProductsCarts()
    {
        return $this->hasMany(ProductCart::class, "id_cart", "id");
    }

    public function Products(){
        return $this->belongsToMany(Product::class,"product_cart","id_cart","id_product");
    }

    public function  User(){
        return $this->belongsTo(User::class,"id_user","id");
    }


}
