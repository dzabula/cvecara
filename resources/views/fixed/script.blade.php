<!-- COMMON SCRIPTS -->
<script src="{{asset("asset/js/common_scripts.min.js")}}"></script>
<script src="{{asset("asset/js/main.js")}}"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="{{asset("asset/js/carousel-home.min.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
