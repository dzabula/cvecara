<div class="sidebar-left">
    <div class="sidebar-left-info">

        <div class="user-box">
            <div class="d-flex justify-content-center">
                <img src="{{asset("asset/img/avatar1.jpg")}}" alt="" class="img-fluid rounded-circle">
            </div>
            <div class="text-center text-white mt-2">
                <h6>{{session()->get("user")->first_name." ".session()->get("user")->last_name}}</h6>
                <p class="text-muted m-0">Admin</p>
                <a class="btn btn-danger mt-2" href="{{route("logout")}}">Izlogujte se</a>
            </div>
        </div>

        <!--sidebar nav start-->
        <ul class="side-navigation">
            <li>
                <h3 class="navigation-title">Navigation</h3>
            </li>
            <li >
                <a href="{{route("dashboard")}}"><i class="mdi mdi-gauge"></i> <span>Porudzbine</span></a>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-buffer"></i> <span>Proizvodi</span></a>
                <ul class="child-list">
                    <li><a href="{{route("admin-products")}}"><i class="mdi mdi-google-circles-extended"></i> <span>Svi proizvodi</span></a></li>
                    <li><a href="{{route("admin-products-new")}}"><i class="mdi mdi-book-multiple"></i> <span>Novi proizvod</span></a></li>
                </ul>
            </li>
            <li >
                <a href="{{route("statistic")}}"><i class="mdi mdi-chart-arc"></i> <span>Statistika</span></a>
            </li>

        </ul><!--sidebar nav end-->
    </div>
</div><!-- sidebar left end-->
