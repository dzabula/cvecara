<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "adress";
    protected $fillable = ['adress',"postalcode","id_city"];

    public function City(){
        return $this->belongsTo(City::class,"id_city","id");
    }

}
