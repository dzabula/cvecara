<script src="{{asset("admin/assets/js/main.js")}}"></script>
<script src="{{asset("admin/assets/js/jquery-3.2.1.min.js")}}"></script>
<script src="{{asset("admin/assets/js/popper.min.js")}}"></script>
<script src="{{asset("admin/assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("admin/assets/js/jquery-migrate.js")}}"></script>
<script src="{{asset("admin/assets/js/modernizr.min.js")}}"></script>
<script src="{{asset("admin/assets/js/jquery.slimscroll.min.js")}}"></script>
<script src="{{asset("admin/assets/js/slidebars.min.js")}}"></script>

<!--plugins js-->
<script src="{{asset("admin/assets/plugins/counter/jquery.counterup.min.js")}}"></script>
<script src="{{asset("admin/assets/plugins/waypoints/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("admin/assets/plugins/sparkline-chart/jquery.sparkline.min.js")}}"></script>
<script src="{{asset("admin/assets/pages/jquery.sparkline.init.js")}}"></script>

<script src="{{asset("admin/assets/plugins/chart-js/Chart.bundle.js")}}"></script>
<?php /*
<script src="{{asset("admin/assets/plugins/morris-chart/morris.js")}}"></script>
*/ ?>
 <script src="{{asset("admin/assets/pages/dashboard-init.js")}}"></script>




<!--app js-->
<script src="{{asset("admin/assets/js/jquery.app.js")}}"></script>
<script>
    var csrf = "{{csrf_token()}}";
    window.onload = () => {
       $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    };
</script>
