<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Statistic extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "statistic";
    protected $fillable = ['id_user',"id_action","created_at","updated_at","deleted_at"];


    public function User(){
        return $this->belongsTo(User::class,"id_user","id");
    }

    public static function SaveAction($id_user,$action){
            try{
                $id_action = DB::table("action")->where("action",$action)->first()->id;
                Statistic::create([
                    "id_user" => $id_user,
                    "id_action" => $id_action,
                    "created_at" => time()
                ]);

            }catch (\Exception $e){
                \Log::error($e->getMessage());
            }
    }
}
