@extends("layout.layout")
@section("aditional_head")

    <link href="{{asset("asset/css/cart.css")}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset("asset/css/order1.css")}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection
@section("title")
    Korpa
@endsection
@section("keyword")
    PRva Druga Treca Cetvrta Peta
@endsection
@section("description")
    Opis stranice
@endsection

@section("content")
    @if($errors->any())
        @foreach($errors as $e)

            <div class="p-3 bg-danger">
                <p >{{$e}}</p>
            </div>
        @endforeach
    @endif
<main>


<div>
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Pocetna</a></li>
                    <li><a href="#">Korpa</a></li>

                </ul>
            </div>
            <h1>Korpa</h1>
        </div>
        <!-- /page_header -->
        @if($data['products'] != null && count($data['products']) == 0)
            <div>
                <div class="noOneProduct alert alert-warning" role="alert">
                    Nazalasot trenutno ne postoji ni jedan proizvod u korpi
                </div>
            </div>
        @else
            <div class="responsive-table">
                <div id="table" >

                </div>
            </div>
        <div class="row add_top_30 mt-5 flex-sm-row-reverse cart_actions">
            <div class="col-sm-4 text-right">

            </div>
            <div class="col-sm-8">
                <div class="apply-coupon">
                    <div class="form-group form-inline">
                        <input type="text" name="coupon-code" value="" id="cupon-text" placeholder="Promo code" class="form-control">
                        <button type="button" id="cupon" class="btn_1 gray">
                            <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="d-none visually-hidden">Ucitavanje...</span>

                            Akriviraj promo kod
                        </button>
                    </div>
                    <div id="success-offer" class="d-none">
                        <p class="badge-success p-3 font-16">Ostvarili ste <b id="offer"></b>% popusta</p>
                    </div>
                    <div id="field-offer" class="d-none">
                        <p class="badge-danger p-3 font-16">Nazalost uneti kod nije vazeci</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /cart_actions -->

    </div>
    <!-- /container -->

    <div class="box_cart">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <ul>
                        <li>
                            <span>Cena svih proizvoda:</span> <b id="totalCart"></b> RSD
                        </li>
                        <li class="d-none" id="block-offer">
                            <span>Popust</span> <b id="offer-money"></b> RSD
                        </li>

                        <li>
                            <span class="primary">Ukupno</span><b id="masterTotalCart"></b> RSD
                        </li>
                    </ul>
                    <!-- Scrollable modal -->
                    <button id="myBtn"class="btn_1 " target="modal">Naruci</button>

                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content  col-12 col-lg-8 offset-lg-2">

                            <div id="close-modal" class="p-3"><a class="pointer" id="close-modal-button">Zatvori</a></div>

                            <div class="container-fluid px-0" id="bg-div">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9 col-12">
                                        <div class="card card0">
                                            <div class="d-flex" id="wrapper">
                                                <!-- Sidebar -->
                                                <div class=" col-12 pb-5 bg-light border-right" id="sidebar-wrapper">
                                                    <div class="sidebar-heading col-12 pt-5 pb-4 text-center"><strong>Realizacija porudzbine</strong></div>
                                                    <div class="list-group col-12 list-group-flush"> <a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item active1">
                                                            <div class=" col-12 my-list-div list-div my-2 text-center">
                                                                <div class="fa fa-home"></div><span class="text-center w-100">Dostava na adresu</span>
                                                            </div>
                                                        </a> <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item active1 active">
                                                            <div class="col-12 my-list-div list-div my-2 text-center">
                                                                <div class="fa fa-credit-card"></div><span class="text-center w-100">Licno preuzimanje u radnji</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div> <!-- Page Content -->
                                                <div class="col-12" id="page-content-wrapper">

                                                    <div class="row justify-content-center">
                                                        <div class="text-center" id="test">Detalji o porudzini*</div>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div id="menu1" class="tab-pane">
                                                            <div class="row justify-content-center">
                                                                <div class="col-11">
                                                                    <div class="form-card">
                                                                        <h4 class="mt-0 mb-4 text-center">Unesite informacije o porudzbini</h4>
                                                                        <form id="form-2" action="{{route("invoice")}}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="cupon" value="" class="set-cupon"/>
                                                                            <input type="hidden" name="delivery" value="dostava" />
                                                                            @if(session()->has("user"))
                                                                                <input type="hidden" name="id_cart" value="{{$data['id_cart']}}" />
                                                                            @endif
                                                                            <div class="d-flex flex-column">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <label class="w-100 text-left">Email</label>
                                                                                        <input type="email" name="email" class="form-group w-100" id="email-2" placeholder="primer@gmail.com" value="@if(session("user") != null) {{session()->get("user")->email}}@endif "/>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <label class="w-100 text-left">Ime</label>
                                                                                        <input type="text" name="first_name" class="form-group w-100" id="first-name-2" placeholder="Vase ime" value="@if(session("user") != null) {{session()->get("user")->first_name}}@endif "/>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <label class="w-100 text-left">Prezime</label>
                                                                                        <input type="text" name="last_name" class="form-group w-100" id="last-name-2" placeholder="Vase prezime" value="@if(session("user") != null) {{session()->get("user")->last_name}}@endif "/>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <label class="w-100 text-left">Telefon</label>
                                                                                        <input type="text" name="phone" class="form-group w-100" id="phone-2" placeholder="Npr. +3816012345678" value="@if(session("user") != null) {{session()->get("user")->phone}}@endif "/>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <label class="w-100 text-left">Grad</label>
                                                                                        <select type="text" name="city" class="form-group w-100" id="city-2" >
                                                                                            <option value="0">Izaberite grad</option>

                                                                                            @foreach($data['city'] as $e)
                                                                                                @if(session()->has("user") && session()->get("user")->Adress->City->id == $e->id)
                                                                                                    <option value="{{$e->id}}" selected>{{$e->city}}</option>
                                                                                                @else
                                                                                                    <option value="{{$e->id}}" selected>{{$e->city}}</option>
                                                                                                @endif
                                                                                            @endforeach

                                                                                        </select>

                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <label class="w-100 text-left">Postanski broji</label>
                                                                                        <input type="text" name="postalcode" class="form-group w-100" id="postalcode-2" placeholder="Npr. +3816012345678" value="@if(session("user") != null) {{session()->get("user")->postalcode}}@endif "/>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <label class="w-100 text-left">Adresa</label>
                                                                                        <input type="text" name="adress" class="form-group w-100" id="adress-2" placeholder="Npr. +3816012345678" value="@if(session("user") != null) {{session()->get("user")->adress}}@endif "/>
                                                                                    </div>


                                                                                    <div class="col-12 mb-3 d-flex justify-content-center">
                                                                                        <button  type="button" id="checkout-2" class="col-12 col-md-6 col-lg-5 btn btn-primary">Zavrsi porudzbinu
                                                                                            <span id="checkout-spiner-2" class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                                        </button>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="menu2" class="tab-pane in active">
                                                            <div class="row justify-content-center">
                                                                <div class="col-11">
                                                                    <div class="form-card">
                                                                        <h4 class="mt-0 mb-4 text-center">Unesite informacije o porudzbini</h4>
                                                                        <form   id="form-1" action="{{route("invoice")}}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="cupon" value="" class="set-cupon"/>
                                                                            @if(session()->has("user"))
                                                                                <input type="hidden" name="id_cart" value="{{$data['id_cart']}}" />
                                                                            @endif
                                                                            <input type="hidden" name="delivery" value="dolazak" />
                                                                            <div class="row">

                                                                                <div class="col-12">
                                                                                    <label class="w-100 text-left">Email</label>
                                                                                    <input type="email" name="email" class="form-group w-100" id="email-1" placeholder="primer@gmail.com" value="@if(session("user") != null) {{session()->get("user")->email}}@endif "/>
                                                                                </div>

                                                                                <div class="col-12">
                                                                                    <label class="w-100 text-left">Ime</label>
                                                                                    <input type="text" name="first_name" class="form-group w-100" id="first-name-1" placeholder="Vase ime" value="@if(session("user") != null) {{session()->get("user")->first_name}}@endif "/>
                                                                                </div>


                                                                                <div class="col-12">
                                                                                    <label class="w-100 text-left">Prezime</label>
                                                                                    <input type="text" name="last_name" class="form-group w-100" id="last-name-1" placeholder="Vase prezime" value="@if(session("user") != null) {{session()->get("user")->last_name}}@endif "/>
                                                                                </div>


                                                                                <div class="col-12">
                                                                                    <label class="w-100 text-left">Telefon</label>
                                                                                    <input type="text" name="phone" class="form-group w-100" id="phone-1" placeholder="Npr. +3816012345678" value="@if(session("user") != null) {{session()->get("user")->phone}}@endif "/>
                                                                                </div>


                                                                                <div class="col-12 mb-3 d-flex justify-content-center">
                                                                                    <button  type="button" id="checkout-1" class="col-12 col-md-6 col-lg-5 btn btn-primary">Zavrsi porudzbinu
                                                                                        <span id="checkout-spiner-1" class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                                    </button>
                                                                                </div>

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error("email")
                                                            {{$message}}
                                                        @enderror
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif


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
        </div>
    </div>
    <!-- /box_cart -->

    @endif
</div>
    </main>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

@endsection
@section("aditionalScripts")

    <script>
        var csrf = `{{csrf_token()}}`;
        var AddItemsToCartForGhost = `{{route("ghost-cart")}}`
        var urlToCupon = "{{route("cupon")}}"
        var urlToGetCart = "{{route("cart")}}";
        var urlToDecrementQuantity = "{{route("decrement-quantity")}}";
        window.addEventListener("DOMContentLoaded", (event) => {
            @if(session()->get("user") == null)
           // WriteIdCartInForm();
            WriteProductsInPageChart(JSON.parse(localStorage.getItem("cart")))
            @else
            var x = new Array(<?php echo json_encode($data['products']) ?>)

            WriteProductsInPageChart(x[0]);

            @endif

            @if($errors->any())

                $("#myModal").css("display","block");
            @endif
        })

    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset("asset/js/cartPage.js")}}"></script>
@endsection
