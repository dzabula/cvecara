<div class="header-section">
    <!--logo and logo icon start-->
    <div class="logo">
        <a href="{{route("dashboard")}}">

                            <span class="logo-img">
                                <img src="assets/images/logo_sm.png" alt="" height="26">
                            </span>
            <!--<i class="fa fa-maxcdn"></i>-->
            <span class="brand-name">Cveacara</span>
        </a>
    </div>

    <!--toggle button start-->
    <a class="toggle-btn"><i class="ti ti-menu"></i></a>
    <!--toggle button end-->

    <!--mega menu start-->
    <div id="navbar-collapse-1" class="navbar-collapse collapse mega-menu">
        <ul class="nav navbar-nav">
            <!-- Classic dropdown -->

            <!-- Classic list -->
            <li>
                <form class="d-block search-content" action="{{route("admin-products")}}" method="GET">
                    <input type="text" class="form-control mt-3" @if(isset($_GET['keyword'])) value="{{$_GET['keyword']}}"  @endif name="keyword" placeholder="Pretrazi proizvode...">
                    <button type="submit" class="search-button"><i class="ti ti-search"></i></button>

                </form>
            </li>
        </ul>
    </div>
    <!--mega menu end-->
<?php /*
    <div class="notification-wrap">

        <div class="right-notification">
            <ul class="notification-menu">
                <li>
                    <a href="javascript:;" class="notification" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge badge-success">4</span>
                    </a>
                    <ul class="dropdown-menu mailbox dropdown-menu-right">
                        <li>
                            <div class="drop-title">Notifications</div>
                        </li>
                        <li class="notification-scroll">
                            <div class="message-center">
                                <a href="#">
                                    <div class="user-img">
                                        <i class="ti ti-star"></i>
                                    </div>
                                    <div class="mail-contnet">
                                        <h6>Jane A. Seward</h6>
                                        <span class="mail-desc">Iwon meddle and...</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="user-img">
                                        <i class="ti ti-heart"></i>
                                    </div>
                                    <div class="mail-contnet">
                                        <h6>Michael W. Salazar</h6>
                                        <span class="mail-desc">Lovely gide learn for you...</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="user-img">
                                        <i class="ti ti-image"></i>
                                    </div>
                                    <div class="mail-contnet">
                                        <h6>David D. Chen</h6>
                                        <span class="mail-desc">Send his new photo...</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="user-img">
                                        <i class="ti ti-bell"></i>
                                    </div>
                                    <div class="mail-contnet">
                                        <h6>Irma J. Hendren</h6>
                                        <span class="mail-desc">6:00 pm our meeting so...</span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="text-center bg-light" href="javascript:void(0);">
                                <strong>See all notifications</strong>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="notification" data-toggle="dropdown">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="badge badge-danger">9</span>
                    </a>
                    <ul class="dropdown-menu mailbox dropdown-menu-right">


                        <li>
                            <a href="javascript:;" data-toggle="dropdown">
                                <img src="assets/images/users/avatar-1.jpg" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-menu">
                               <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                <a class="dropdown-item" href="#"><span class="badge badge-success pull-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                            </div>

                        </li>

                        <li>
                            <div class="sb-toggle-right">
                                <i class="mdi mdi-apps"></i>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
*/?>


</div>
