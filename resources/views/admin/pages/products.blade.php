@extends("layout.layoutAdmin")

@section("content")



    <div class="container-fluid">
        <div class="page-head">
            <h4 class="mt-2 mb-2">Dashboard</h4>
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
                                    <h3 class="m-0 counter">{{WriteMoney(floor($data['total_profit']))}}</h3>
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
                                    <h3 class="m-0 counter">{{$data['num_products']}}</h3>
                                    <p class="mb-0">Proizvoda na stanju</p>
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
                                    <h5 class="header-title pb-3">Proizvodi</h5>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover m-b-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Obiris</th>
                                                        <th>Izemni</th>
                                                        <th>Id</th>
                                                        <th>Naziv</th>
                                                        <th>Kategorija</th>
                                                        <th>Podkategorija</th>
                                                        <th>Trenutna Cena</th>
                                                        <th>Trenutni popust</th>
                                                        <th>Datum kreiranja</th>
                                                        <th>Datum brisanja</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data['products'] as $p)
                                                        <tr>
                                                            @if($p->deleted_at == null)
                                                            <td>
                                                                <button type="button" class="delete btn btn-danger sa-warning" data-item-type="product" data-id="{{$p->id}}"  id="">Obrisi</button>
                                                            </td>
                                                            @else
                                                                <td>
                                                                    <form id="redelete-form" action="{{route("redelete-product")}}" method="POST">
                                                                        @csrf
                                                                        <button type="submit" class="delete btn btn-danger"  name="id" value="{{$p->id}}">
                                                                            Vrati na stanje
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            @endif
                                                            <td><a href="{{route("single-product")."/".$p->id}}" class="btn btn-primary  text-light">Pregledaj</a></td>
                                                            <td>{{$p->id}}</td>
                                                            <td>{{$p->name}}</td>
                                                            <td>{{$p->Categories->Parent->category}}</td>
                                                            <td>{{$p->Categories->category}}</td>
                                                            <td>{{WriteMoney((float)$p->Price[0]->price)}} RSD</td>
                                                            <td>{{count($p->Offer) > 0 ? $p->Offer[0]->amount: "Nema popusta"}}</td>
                                                            <td>{{$p->created_at}}</td>
                                                            <td>{{$p->deleted_at == null ? "Nije izbrisan jos uvek" : $p->deleted_at}}</td>


                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                                <div class="pagination-links">
                                                    {{$data['products']->withQueryString(isset($_GET['keyword']) ? $_GET['keyword'] : "")->onEachSide(1)->links()}}
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





        </div>

    </div><!--end container-->





@endsection
@section("aditionalScript")
    <script>
        var  urlToDeleteInvoice = "{{route("delete-products")}}" // ostalo je ovako da ne bih morao da cackam js fajl
        //var urlToChangeStatusInvoice = "{{route("change-status-invoice")}}"
    </script>
    <script src="{{asset("admin/assets/plugins/sweet-alert/sweetalert2.js")}}"></script>
    <script src="{{asset("admin/assets/pages/jquery.sweet-alert.init.js")}}"></script>
@endsection

