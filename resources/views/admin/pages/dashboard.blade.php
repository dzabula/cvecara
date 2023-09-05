@extends("layout.layoutAdmin")

@section("content")



        <div class="container-fluid">
            <div class="page-head">
                <h4 class="mt-2 mb-2">Kontrolna tabla</h4>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="row">
                        <div class="col-12 col-lg-3 col-sm-6">
                            <div class="widget-box bg-white m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-6">
                                        <div class="text-center"><i class="ti ti-eye"></i></div>
                                    </div>

                                    <div class="col-6">
                                        <h3 class="m-0 counter">{{$data['loged_today']}}</h3>
                                        <p class="mb-0">Loged Today</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-sm-6">
                            <div class="widget-box bg-white m-b-30">
                                <div class="row d-flex align-items-center text-center">
                                    <div class="col-6">
                                        <div class="text-center"><i class="ti ti-user"></i></div>
                                    </div>
                                    <div class="col-6">
                                        <h3 class="m-0 counter text-left">{{$data['num_users']}}</h3>
                                        <p class="mb-0 text-left">Broji  korisnika</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-sm-6">
                            <div class="widget-box bg-white m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-6">
                                        <div class="text-center"><i class="ti ti-money"></i></div>
                                    </div>

                                    <div class="col-6">
                                        <h3 class="m-0 counter" id="total-profit" data-profit="{{ number_format($data['total_profit'], 0)}}" >{{WriteMoney(floor($data['total_profit']))}}</h3>
                                        <p class="mb-0">Ukupna zarada</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-sm-6">
                            <div class="widget-box bg-white m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-6">
                                        <div class="text-center"><i class="ti ti-wallet"></i></div>
                                    </div>

                                    <div class="col-6">
                                        <h3 class="m-0 counter">{{$data['num_invoices']}}</h3>
                                        <p class="mb-0">Broji porudzbina</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card m-b-30">
                        <div class="card-body p-0">

                            <div class="col-lg-12 col-sm-12 py-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="header-title pb-3">Porudzbine</h5>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover m-b-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Obiris</th>
                                                            <th>Pregled</th>
                                                            <th>Stanje</th>
                                                            <th>Akcija</th>
                                                            <th>Id</th>
                                                            <th>Ime</th>
                                                            <th>Prezime</th>
                                                            <th>Email</th>
                                                            <th>Telefon</th>
                                                            <th>Grad</th>
                                                            <th>Postanski broji</th>
                                                            <th>Adresa</th>
                                                            <th>Ukupna cena</th>
                                                            <th>Datum narucivanja</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($data['invoices'] as $i)
                                                            <tr>

                                                                <td>
                                                                    <button type="button" class="delete btn btn-danger sa-warning" data-id="{{$i->id}}"  id="">Obrisi</button>
                                                                </td>
                                                                <td><button id="{{$i->id}}" class="view btn btn-primary "><a href="{{route("single-invoice",$i->id)}}" class="text-light">Pregledaj</a></button></td>
                                                                <td><button class="view btn btn-primary "><a class="text-light" id="status-{{$i->id}}">{{$i->Status->status}}</a></button></td>
                                                                <td><button  data-id="{{$i->id}}" data-status-id="{{$i->Status->id}}" class="complete btn btn-success sa-success" >{{ $i->Status->status == "Nije poslato" ? "Posalji" : ( $i->Status->status == "Isporuceno" ? "Isporuceno" : "Isporuci")}}</button></td>
                                                                <td>{{$i->serial_number}}</td>
                                                                <td>{{$i->first_name}}</td>
                                                                <td>{{$i->last_name}}</td>
                                                                <td>{{$i->email}}</td>
                                                                <td>{{$i->phone}}</td>
                                                                <td>{{$i->Adress != null ? $i->Adress->City->city : "Preuzimanje u radnji"}}</td>
                                                                <td>{{$i->Adress != null ? $i->Adress->postalcode : "Preuzimanje u radnji"}}</td>
                                                                <td>{{$i->Adress != null ? $i->Adress->adress : "Preuzimanje u radnji"}}</td>
                                                                <td ><span id="total-price-{{$i->id}}">{{WriteMoney(floor($i->total_price))}}</span> rsd</td>

                                                                <td>{{$i->created_at}}</td>

                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                    <div class="pagination-links">
                                                        {{$data['invoices']->onEachSide(1)->links()}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

<?php /*
                <div class="col-lg-4 col-sm-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="header-title pb-3">Summary</h5>
                            <div id="morris-donut-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="header-title pb-3">Revenue</h5>
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="header-title pb-3">Email Sent</h5>
                            <div id="extra-area-chart"></div>
                        </div>
                    </div>
                </div>


*/?>
            </div>

        </div><!--end container-->





@endsection
@section("aditionalScript")
    <script>
       var  urlToDeleteInvoice = "{{route("delete-invoice")}}"
       var urlToChangeStatusInvoice = "{{route("change-status-invoice")}}"
    </script>
    <script src="{{asset("admin/assets/plugins/sweet-alert/sweetalert2.js")}}"></script>
    <script src="{{asset("admin/assets/pages/jquery.sweet-alert.init.js")}}"></script>
@endsection

