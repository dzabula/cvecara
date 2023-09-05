<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProduct;
use App\Models\Invoice;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;

class AdminController extends BaseController
{

    public  function __construct()
    {
        parent::__construct();
        $this->data['num_users'] = User::count();
        $this->data['loged_today'] = Statistic::where("created_at", date("Y-m-d",time()))->count();
        $this->data['invoices'] = Invoice::orderBy("created_at","DESC")->paginate(10);
        foreach ($this->data['invoices'] as $i){
            $i->status = $i->Status->status;

            $i->Adress;
        }
        $invoice_ = new Invoice();
        $this->data['num_invoices'] = Invoice::count();
        $this->data['total_profit'] = $invoice_->totalProfit();




    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("admin.pages.dashboard", ['data' => $this->data]);
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
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(UpdateProductRequest $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }




}
