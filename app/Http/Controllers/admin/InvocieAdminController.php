<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Invoice;
use App\Models\InvoiceStatus;
use Illuminate\Http\Request;

class InvocieAdminController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice =  Invoice::find($id);
        $products = $invoice->Cart->Products;

        $this->data['invoice'] = $invoice;
        $this->data['products'] = $products;
        return view("admin.pages.single-invoice", ['data'=> $this->data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        if(!is_numeric($request->input("id"))) return response("Wrong params",401);
        try {
            $invoice = new Invoice();
            $invoice->destroy($request->input("id"));
            return response()->json("okej je sve");
        }catch (\Exception $e){

            \Log::error($e->getMessage());
            return response("Internal server error",500);
        }
    }



    public function changeStatusInvoice(Request $request){

            if(!is_numeric($request->input("id"))  || !is_numeric($request->input("id_status")) ) return response("Invalid Params",401);

            try {
                $invoice = Invoice::find($request->input("id"));
                $status = InvoiceStatus::find($request->input("id_status"));


                switch ($status->status) {
                    case "Nije poslato":
                        $new_status = InvoiceStatus::where("status", "Poslato / Na cekanju")->first();
                        break;
                    case "Poslato / Na cekanju":
                        $new_status = InvoiceStatus::where("status", "Isporuceno")->first();
                        break;
                    case "Isporuceno" :
                        $new_status = InvoiceStatus::where("status", "Nije poslato")->first();
                        break;
                }

                $invoice->id_invoice_status = $new_status->id;
                $invoice->updated_at = time();
                $invoice->save();

                return response()->json($new_status);
            }catch (\Exception $e){
                \Log::error($e->getMessage());
                return response($e->getMessage(),500);

            }


    }
}
