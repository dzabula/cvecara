@extends("layout.layout")
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
        #slide-1{
            background-image: url("{{asset("asset/img/slides/home1.png")}}");
        }
        #slide-2{
            background-image: url("{{asset("asset/img/slides/home2.png")}}");
        }
        #slide-3{
            background-image: url("{{asset("asset/img/slides/home3.png")}}");
        }
    </style>
<main>
    <div id="carousel-home">
        <div class="owl-carousel owl-theme">
            <div class="owl-slide cover" id="slide-1">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-end">
                            <div class="col-lg-6 static">
                                <div class="slide-text text-right white">
                                    <h2 class="owl-slide-animated owl-slide-title">Broji 1<br>Najbolji u regionu</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        Vise od 30 godina sa Vama
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{route("filter",[-1,0,0,0,0,1,1,"page=1"])}}" role="button">Pogledaj proizvode</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover" id="slide-2">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white">
                                    <h2 class="owl-slide-animated owl-slide-title">Niske Cene <br>Visok kvalitet</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        Pogledajte nase proizvode i popuste koje smo spremili
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{route("filter",[-1,0,0,0,0,1,1,"page=1"])}}" role="button">Pogledaj proizvode</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover" id="slide-3">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-12 static">
                                <div class="slide-text text-center black">
                                    <h2 class="owl-slide-animated owl-slide-title"><br>Svo cvece iz ponude proizvodimo mi</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        Svaki nas cvet je odgajan na organskoji bazi
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{route("filter",[-1,0,0,0,0,1,1,"page=1"])}}" role="button">Pogledaj proizvode</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
            </div>
        </div>
        <div id="icon_drag_mobile"></div>
    </div>
    <!--/carousel-->

    <ul id="banners_grid" class="clearfix">
        <li>
            <a href="#0" class="img_container">
                <img src="{{asset("asset/img/slides/home-buketi.png")}}" data-src="{{asset("asset/img/slides/home-buketi.png")}}" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>Buketi</h3>
                    <div><span class="btn_1 redirect-products">Pogledaj</span></div>
                </div>
            </a>
        </li>
        <li>
            <a href="#0" class="img_container">
                <img src="{{asset("asset/img/img/slides/home-rezano.png")}}" data-src="{{asset("asset/img/slides/home-rezano.png")}}" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>Rezano cvece</h3>
                    <div><span class="btn_1 redirect-products" >Pogledaj</span></div>
                </div>
            </a>
        </li>
        <li>
            <a href="#0" class="img_container">
                <img src="{{asset("asset/img/slides/home-sahrane.png.")}}" data-src="{{asset("asset/img/slides/home-sahrane.png")}}" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>Sahrane i pomeni</h3>
                    <div><span class="btn_1 redirect-products">Pogledaj</span></div>
                </div>
            </a>
        </li>
    </ul>
    <!--/banners_grid -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Najprodavaniji</h2>
            <br/>
            <br/>
            <br/>
            <span>Proizvodi</span>
            <p>Obradujte svoje bilznje lepim cvecem</p>
        </div>
        <div class="row small-gutters">
            @component("pages.products.components.products",['data' => $data['best_seler'],"best_seler"=>true])
            @endcomponent
            <?php /*
            <div class="col-12 col-md-6 col-xl-3">
                <div class="grid_item">
                    <figure>
                        <span class="ribbon off">-30%</span>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy" src="{{asset("asset/img/products/product_placeholder_square_medium.jpg")}}" data-src="{{asset("asset/img/products/shoes/1.jpg")}}" alt="">
                            <img class="img-fluid lazy" src="{{asset("asset/img/products/product_placeholder_square_medium.jpg")}}" data-src="{{asset("asset/img/products/shoes/1_b.jpg")}}" alt="">
                        </a>
                        <div data-countdown="2019/05/15" class="countdown"></div>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor Air x Fear</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$48.00</span>
                        <span class="old_price">$60.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>

            </div>

            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon off">-30%</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy" src="{{asset("asset/img/products/product_placeholder_square_medium.jpg")}}" data-src="{{asset("asset/img/products/shoes/2.jpg")}}" alt="">
                            <img class="img-fluid lazy" src="{{asset("asset/img/products/product_placeholder_square_medium.jpg")}}" data-src="{{asset("asset/img/products/shoes/2_b.jpg")}}" alt="">
                        </a>
                        <div data-countdown="2019/05/10" class="countdown"></div>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>Armor Okwahn II</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$90.00</span>
                        <span class="old_price">$170.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>

            </div>
            */ ?>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="featured lazy" data-bg="url({{asset("asset/img/offer.jpg")}})">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
            <div class="container margin_60">
                <div class="row justify-content-center justify-content-md-start">
                    <div class="col-lg-6 wow" data-wow-offset="150">
                        <h3>U toku je<br>Veliko snizenje</h3>
                        <p>Pogledaji koji su to proizvodi dostupni po promotivnim cenama</p>
                        <div class="feat_text_block d-flex align-items-center">
                            <div class="price_box">
                                <span class="new_price">DO -{{$data['max-offer']}}%</span>
                            </div>

                            <a class="btn_1" href="{{route("filter",[-1,0,0,0,0,1,1,"page=1"])}}" role="button">Proizvodi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /featured -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Snizenja</h2>
            <span>Proizvoda</span>
            <p class="mt-2">Narucite Vama najlepse cvece dok akcija idalje traje !</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">

            @component("pages.products.components.products",['data' => $data['offer_products']])
            @endcomponent
<?php /*
            <div class="item">
                <div class="grid_item">
                    <span class="ribbon new">New</span>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="owl-lazy" src="{{asset("asset/img/products/product_placeholder_square_medium.jpg")}}" data-src="{{asset("asset/img/products/shoes/4.jpg")}}" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3>ACG React Terra</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$110.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            */?>



            <!-- /item -->
        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

  <!--  <div class="bg_gray">
        <div class="container margin_30">
            <div id="brands" class="owl-carousel owl-theme">
                <div class="item">
                    <a href="#0"><img src="{{asset("img/brands/placeholder_brands.png")}}" data-src="{{asset("aaset/img/brands/logo_1.png")}}" alt="" class="owl-lazy"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="{{asset("img/brands/placeholder_brands.png")}}" data-src="{{asset("aaset/img/brands/logo_2.png")}}" alt="" class="owl-lazy"></a>
                </div>
                    <div class="item">
                    <a href="#0"><img src="{{asset("img/brands/placeholder_brands.png")}}" data-src="{{asset("aaset/img/brands/logo_3.png")}}" alt="" class="owl-lazy"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="{{asset("img/brands/placeholder_brands.png")}}" data-src="{{asset("aaset/img/brands/logo_4.png")}}" alt="" class="owl-lazy"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="{{asset("img/brands/placeholder_brands.png")}}" data-src="{{asset("aaset/img/brands/logo_5.png")}}" alt="" class="owl-lazy"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="{{asset("img/brands/placeholder_brands.png")}}" data-src="{{asset("aaset/img/brands/logo_6.png")}}" alt="" class="owl-lazy"></a>
                </div>
            </div>
        </div>
    </div>-->
    <!-- /bg_gray -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Vesti</h2>
            <span>Blog</span>
            <p>Pratite nase oglase</p>
        </div>
        <div class="row">
            <div class="col-12">
                <a class="box_news" >
                    <figure>
                        <img src="{{asset("asset/img/staff/radnik.png")}}" data-src="{{asset("asset/img/staff/radnik.png")}}" alt="" width="400" height="266" class="lazy">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>by Administrator</li>
                        <li>20.11.2022</li>
                    </ul>
                    <h4>Potrebni radnici u cvecari</h4>
                    <p>Ukoliko volis da radis sa cvecem i imas prethodnog iskustva u radu sa cvecem javite nam se!</p>
                </a>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>

@endsection
@section("snackbar")
    <div id="snackbar">Proizvod je dodat u korpu</div>
@endsection
@section("aditionalScripts")
    <script>

            console.log("okej")
            $(".redirect-products").click(function (){
                window.location = "{{route("filter",[-1,0,0,0,0,1,1,"page=1"])}}";
            })
        </script>
@endsection
