<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\InvoiceStatus;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = "invoice";
    protected $fillable = ['id_cart',"id_adress","deleted_at","id_inovice_status ","first_name","last_name","phone","email","serial_number","id_cupon","total_price"];

    public function totalProfit(){
        $id_for_deleveried = InvoiceStatus::where("status","Isporuceno")->get()[0]->id;
        return Invoice::where([["deleted_at", null],["id_invoice_status",$id_for_deleveried]])->sum("total_price");
          //  return Invocie::sum("total_price");
    }

    public function Adress(){
        return $this->belongsTo(Adress::class,"id_adress","id");
    }

    public function Status(){
        return $this->belongsTo(InvoiceStatus::class,"id_invoice_status","id");
    }

    public function Cupon(){
        return $this->belongsTo(Cupon::class,"id_cupon","id");
    }
    public function Cart(){
        return $this->belongsTo(Cart::class,"id_cart","id");
    }
}
