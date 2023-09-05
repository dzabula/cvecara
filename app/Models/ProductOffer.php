<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOffer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ="product_offer";
    protected $fillable = ['id_offer',"id_product","created_at","deleted_at","updated_at"];

}
