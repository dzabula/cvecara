@extends("layout.layoutAdmin")

@section("content")

    <div class="container-fluid">
    <div class="page-head">
        <h4 class="my-2">Porudzbina</h4>
    </div>
    <div class="row">
        <div class="col-12 m-b-30">
            <div class="card">
                <div class="card-body invoice">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-right"><img src="{{asset("admin/assets/images/logo_sm_2.png")}}" alt="s"></h4>
                        </div>
                        <div class="pull-right">
                            <h6>Porudzbina : #
                                <strong>{{$data['invoice']->serial_number}}</strong>
                            </h6>
                            <h6 class="pull-right">Date : {{$data['invoice']->created_at}}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="pull-left mt-4">
                                <div id="personal-info" class="">
                                    <abbr title="Ime">Ime: </abbr> &nbsp;&nbsp;{{$data['invoice']->first_name}}<br/>
                                    <abbr title="Prezime">Prezime: </abbr>&nbsp;&nbsp;{{$data['invoice']->last_name}}<br/>
                                    <abbr title="email">Email: </abbr>&nbsp;&nbsp;{{$data['invoice']->email}}<br/>
                                </div>
                                <address>
                                    @if($data['invoice']->Adress != null)
                                    <strong>Adresa za dostavu</strong><br>
                                        {{$data['invoice']->Adress->adress}}<br>
                                        {{$data['invoice']->Adress->postalcode}}<br>
                                        {{$data['invoice']->Adress->City->city}}<br>
                                    @else
                                        <p class="mb-0">Musterija dolazi sama po narudzbinu u radnju</p>

                                    @endif
                                    <abbr title="Phone">Telefon:</abbr> <a href="tel:{{$data['invoice']->phone}}">{{$data['invoice']->phone}}</a>
                                </address>
                            </div>
                            <div class="pull-right mt-4">
                                <p><strong>Datum kreiranja: </strong>{{$data['invoice']->created_at}}</p>
                                @if($data['invoice']->Status->status == "Isporuceno") <p><strong>Datum isporuke: </strong>{{$data['invoice']->updated_at}}</p>@endif

                                <p><strong>Status: </strong> <span class="badge badge-warning">{{$data['invoice']->Status->status}}</span></p>
                                <p><strong>ID: </strong> {{$data['invoice']->serial_number}}</p>
                            </div>
                        </div>
                    </div><!--end row-->

                    <div class="h-50"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead>
                                    <tr><th>Id</th>
                                        <th>Proizvod</th>
                                        <th>Kolicina</th>
                                        <th>Snizenje</th>
                                        <th>Cena po kom.</th>
                                        <th>Ukupno</th>
                                    </tr></thead>
                                    <tbody>
                                    <?php $total = 0; $cupon = 0;$amount = 0 ?>
                                    @foreach($data['products'] as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$quantity = $p->ProductCart->where("id_cart",$data['invoice']->Cart->id)->first()->quantity}}</td>

                                        <td>@if(($off = \App\Models\Product::GetHistoryOffer($p,$data['invoice'])) != null)
                                               <?php $amount = $off->amount ?>
                                                -{{$amount}}%

                                            @else
                                            0
                                            @endif

                                        </td>
                                        <td>
                                                {{ WriteMoney(floor($price_ = \App\Models\Product::GetHistoryPrice($p,$data['invoice'])->price))}} RSD
                                        </td>
                                        <td>{{WriteMoney(floor( $price_ * $quantity - ($price_ * $quantity * $amount / 100)))}} RSD</td>
                                        <?php $total += $price_ * $quantity - ($price_ * $quantity * $amount / 100)?>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--end row-->

                    <div class="row" style="border-radius: 0px;">
                        <!--<div class="col-md-9">
                            <p><strong>Terms And Condition : </strong></p>
                            <ul>
                                <li><small>All accounts are to be paid within 7 days from receipt of invoice. </small></li>
                                <li><small>To be paid by cheque or credit card or direct payment online.</small></li>
                                <li><small> If account is not paid within 7 days the credits details supplied as confirmation<br> of work undertaken will be charged the agreed quoted fee noted above.</small></li>
                            </ul>
                        </div>-->
                        <div class="col-md-9 mt-3">
                            <p><strong>Pravila: </strong></p>
                            <ul>
                                <li><small>Proizvod sme biti vracen maksimalno posle 7 dana od dana isporuke. </small></li>
                                <li><small>Ne vrsi se zamena kupljenog proizvoda za novac.</small></li>
                                <li><small>Vraceni proizvod je moguce zameniti samo drugim proizvodom u istoji ili nizoji ceni.</small></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <p class="text-right"><strong>Ukupna cena:</strong> {{WriteMoney(floor($total))}} RSD</p>
                            @if($cupon = $data['invoice']->Cupon)
                            <p class="text-right">Popust uz kupon: {{$cupon->offer}}%</p>
                            <hr>
                            <h4 class="text-right">Cena bez popusta: {{WriteMoney(floor($total))}} RSD</h4>
                            @else
                            <?php
                                    $cupon = new stdClass();
                                    $cupon->offer= 0
                            ?>

                            @endif
                            <hr>
                            <h4 class="text-right">Za uplatu: {{WriteMoney(floor($total - $total * $cupon->offer /100))}} RSD</h4>
                        </div>
                    </div><!--end row-->

                    <hr>
                    <div class="hidden-print">
                        <div class="text-center text-muted"><small>Hvala na ukazanom poverenju</small></div>
                        <div class="pull-right">
                           <!-- <a href="#" class="btn btn-dark"><i class="fa fa-print"></i></a>
                            <a href="#" class="btn btn-primary">Submit</a>
                            <a href="#" class="btn btn-primary">Cancel</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->

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
