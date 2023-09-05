<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
   // use SoftDeletes;
    protected $table = "category";

    public function Parent(){
        return $this->belongsTo(Category::class, "id_parent","id");
    }

    public function Products(){
        return $this->hasMany(Product::class,"id_category","id")->where("deleted_at",null);
    }


}
