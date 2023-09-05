@extends("layout.layout")
@section("aditional_head")
    <link href="{{asset("asset/css/listing.css")}}" rel="stylesheet">
@endsection
@section("title")
    Početna stranica
@endsection
@section("keyword")
    PRva Druga Treca Cetvrta Peta
@endsection
@section("description")
    Opis stranice
@endsection

@section("content")
    <style>
        #product-img{
            background-image: url({{asset("asset/img/proizvodi-stranica.jpg")}});
            background-attachment: fixed;
        }
    </style>

    <main>
        <div class="top_banner">
            <div id="product-img" class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                <div class="container">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route("home")}}">Pocetna</a></li>
                            <li><a href="#">Proizvodi</a></li>

                        </ul>
                    </div>
                    <h1>Proizvodi - Cvece</h1>
                </div>
            </div>
            <img src="" class="img-fluid" alt="">
        </div>
        <!-- /top_banner -->
        <div id="stick_here"></div>
        <div class="toolbox elemento_stick">
            <div class="container">
                <ul class="clearfix">
                    <li>
                        <div class="d-none sort_select">
                            <select name="sort" class="" id="sort">
                                <!--<option value="1" selected="selected">Sortiraj po naslovu - Rastuce</option>
                                <option value="2">Soritraj po naslovu - Opadajuce</option>-->
                                <option class="p-2" value="1">Sortiraj po ceni - Rastuce</option>
                                <option class="p-2" value="2">Sortiraj po ceni - Opadajuce</option>

                            </select>
                        </div>
                    </li>
                    <li>
                        <a id="view-grid"><i class="ti-view-grid"></i></a>
                        <a id="view-list"><i class="ti-view-list"></i></a>
                    </li>
                    <li>
                        <a href="#0" class="open_filters">
                            <i class="ti-filter"></i><span>Filters</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /toolbox -->


        <!--container -->
        <div class="container margin_30">

            <div class="row">
                @include("pages.products.components.filter")
                <!-- /col -->
                <div class="col-lg-9">
                    <div id="mask" class=" d-none justify-content-center align-items-center">
                        <div class="spinner-border"></div>
                    </div>
                    <div class="row small-gutters"  id="container-with-products">
                        @if(count($data['products']) == 0 )
                            <div>
                                <div class="noOneProduct alert alert-warning" role="alert">
                                    Nazalasot trenutno ne postoji ni jedan trazeni proizvod
                                </div>
                            </div>

                        @endif

                        @component("pages.products.components.products",['data' => $data['products']])
                        @endcomponent


                    </div>
                    <div class="pagination__wrapper">
                        <ul class="pagination" id="wirte-pagination">


                            @for($i = 1 ; $i <= ceil((float)$data['products_num'] / 9); $i++)

                                @if($i == 1)
                                    <li>
                                        <a data-num="{{$i}}"  class="paginate active">{{$i}}</a>
                                    </li>
                                @else
                                    <li>
                                        <a data-num="{{$i}}"  class="paginate">{{$i}}</a>
                                    </li>
                                @endif


                            @endfor

                            @if($data['products_num'] > 9)
                                <li><a href="#0" class="next" title="next page">&#10095;</a></li>
                            @endif

                        </ul>
                    </div>

                </div>
                <!-- /row -->

            </div>
            <!-- /col -->
        </div>
        <!-- /row -->

        </div>
        <!-- /container -->
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
    </main>

@endsection
@section("snackbar")
    <div id="snackbar">Proizvod je dodat u korpu</div>
@endsection
@section("aditionalScripts")

    <script src="{{asset("asset/js/sticky_sidebar.min.js")}}"></script>

    <script>

        var WIDTH_CARDS = "grid";
        var searchText = `{{isset($_GET['search-text']) ? $_GET['search-text'] : ""}}`;

        $("#min-price").val(0).trigger("input");

        $("#view-list").click(function () {
            WIDTH_CARDS = "list";
            if ($(".cards").hasClass("col-md-4"))
                $(".cards").removeClass("col-md-4");
            //   $(".cards").addClass("col-12");
        })
        $("#view-grid").click(function () {
            WIDTH_CARDS = "grid";
            if (!$(".cards").hasClass("col-md-4"))
                $(".cards").addClass("col-md-4");
            //  $(".cards").addClass("col-12");
        })


        var urlToFilter = "{{route("filter")}}";


    </script>
    <script src="{{asset("asset/js/filter.js")}}"></script>
    <script src="{{asset("asset/js/specific_listing.js")}}"></script>

@endsection

