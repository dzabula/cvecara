
<div class="main_nav Sticky">
    <div class="container">
        <div class="row small-gutters">
            <div class="col-xl-3 col-lg-3 col-md-3">
                <nav class="categories">
                    <ul class="clearfix">
                        <li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categories
										</a>
									</span>
                            <div id="menu">
                                <ul>
                                    @foreach($data['categories'] as $category)

                                        @if($category->id_parent == null)

                                            <li><span><a >{{$category->category}}</a></span>
                                                <ul>
                                                @foreach($data['categories'] as $i => $subcategory)

                                                    @if($subcategory->id_parent != null && $category->id == $subcategory->id_parent)
                                                            <li><a href="{{route("filter",[$subcategory->id,$subcategory->id,0,0,0,1,1,"page=1"]) }}">{{$subcategory->category}}</a></li>
                                                    @endif
                                                @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li><span><a id="nav-line-all" href="{{route("filter",[-1,0,0,0,0,1,1,"page=1"])}}">Sve</a></span>

                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                <div class="custom-search-input">
                    <!--/0/0/0/0/0/1/1?page=1-->
                    <form action="{{route("search")}}" method="GET">
                        <input type="text"  name="search-text" id="search-text" value="@if(isset($_GET['search-text'])){{$_GET['search-text']}}@endif" placeholder="Pretrazi proizvode">
                        <button id="search" type="submit"><i class="header-icon_search_custom"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-3">
                <ul class="top_tools">
                    @if(!Request::is('cart'))
                        <li class="mr-5">
                            <div class="dropdown dropdown-cart">
                                <a  id="cart-icon" class="cart_bt" ><strong id="num-product">@if(session()->get("user") != null && array_key_exists("cart",$data)) {{ count($data['cart'])}} @endif</strong></a>
                                <div class="dropdown-menu" id="cart-info">
                                    <ul id="container-items">

                                        <!--<li id="0">
                                            <a href="product-detail-1.html">
                                                <figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                <strong><span><b id="quantity">1x</b> Armor Air x Fear</span>$90.00</strong>
                                            </a>
                                            <a href="#0" class="action"><i class="ti-trash"></i></a>
                                        </li>
                                        <li>
                                            <a href="product-detail-1.html">
                                                <figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                <strong><span>1 x Armor Okwahn II</span>$110.00</strong>
                                            </a>
                                            <a href="0" class="action"><i class="ti-trash"></i></a>
                                        </li>-->
                                    </ul>

                                   <div id="nothing-in-chart" class="" >
                                          <p class="text-center">Trenutno nema proizvoda !</p>
                                    </div>

                                    <div class="total_drop " id="total-drop">

                                        <a href="{{route("cart")}}" class="btn_1 outline">Pogledaj korpu</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                    @endif
                   <!-- <li>
                        <a href="#0" class="wishlist"><span>Wishlist</span></a>
                    </li>-->
                    <li >
                        <div class="dropdown dropdown-access">
                            <a  id="nav-account" class="access_link"><span>Nalog</span></a>
                            <div class="dropdown-menu" id="nav-account-info">
                                @if(session()->has("user"))
                                    <a class="btn_1" href="#"> {{session("user")->first_name ." ". session("user")->last_name}}</a>
                                @else
                                <a href="{{route("login")}}" class="btn_1">Log in / Registracija</a>
                                @endif
                                <ul>
                                    <!--    <li>
                                            <a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
                                        </li>
                                    <li>
                                        <a href="account.html"><i class="ti-package"></i>My Orders</a>
                                    </li>
                                    <li>
                                        <a href="account.html"><i class="ti-user"></i>My Profile</a>
                                    </li>
                                    <li>
                                        <a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
                                    </li>-->
                                @if(session("user"))
                                    <li>
                                        <a href="{{route("logout")}}"><i class="ti-power-off"></i>Odjavi se</a>
                                    </li>
                                @endif
                                </ul>
                            </div>
                        </div>
                        <!-- /dropdown-access-->
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                    </li>
                    <li class="categories-for-phone">
                        <a href="#menu" class="btn_cat_mob">
                            <div class="hamburger hamburger--spin" id="hamburger">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                            Categories
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>

    <div class="search_mob_wp mb-4">
        <form action="{{route("search")}}" method="GET">
            <input type="text" name="search-text" id="search-text-2" value="@if(isset($_GET['search-text'])){{$_GET['search-text']}}@endif" class="form-control" placeholder="Search over 10.000 products">
            <input id="search-2" type="submit" type="submit" class="btn_1 full-width" value="Search">
        </form>
    </div>
    <!-- /search_mobile -->
</div>
<script>
    // Variable wich support wide on application

    const globalUrl = "{{route("home")}}";
    const  isLogedIn = <?php echo (string)(session()->has("user")) ? "true" : "false"?> ;
    const urlToAddCart = "{{route("addCart")}}";
    const global_url = "{{route('home')}}";
    var csrf = "{{csrf_token()}}";
    var urlToDeleteCart = "{{route("deleteCart")}}";
    document.addEventListener("DOMContentLoaded", function() {
    @if(session()->get("user") == null)


        WriteProductsToChart(JSON.parse(localStorage.getItem("cart")));

    @else

        let x = new Array(<?php if(array_key_exists("cart",$data))echo json_encode($data['cart']) ;else echo '[]';?>)
        WriteProductsToChart(x[0]);
    @endif

    });
</script>
