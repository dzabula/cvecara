<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends BaseController
{

    public function index(Request $request)
    {
        $cupon = $request->input("cupon");
        $obj = Cupon::where([["status","<>",0],["cupon",$cupon]])->first();
        if($obj != null)
            return  response()->json($obj);
        else return  response()->json(0);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
