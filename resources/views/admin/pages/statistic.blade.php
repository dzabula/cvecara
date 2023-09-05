@extends("layout.layoutAdmin")
@section("aditionalHead")
    <link href="{{asset("admin/assets/plugins/bootstrap-xeditable/css/bootstrap-editable.css")}}" rel="stylesheet" />

@endsection
@section("content")

    <div class="container-fluid">
        <div class="page-head">
            <h4 class="mt-2 mb-2">Akcije korisnika</h4>
        </div>

        <form action="{{route("statistic")}}" method="GET">
            <div class="row py-5">
                <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
                    <label for="date-action">Filtriraj po datumu</label>
                    <input type="date" name="date" id="date-action" class="p-3 input-group date" value="@if(isset($_GET['date'])){{$_GET['date']}}@endif"/>
                    <div class="py-2 d-flex justify-content-center">
                        <button class="btn btn-primary mx-auto" type="submit">Filtriraj</button>
                    </div>
                </div>
            </div>
        </form>

            <div class="row">


                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="header-title pb-3">Statistika akcija korisnika</h5>
                            <div class="card-box">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        @foreach($data['actions'] as $action)
                                            <tr>
                                                <td>{{$action->action}}</td>
                                                <td>{{$action->number}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

    </div><!--end row-->

    </div><!--end container-->
@endsection
@section("aditionalScript")



    <script src="{{asset("admin/assets/plugins/moment/moment.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("admin/assets/plugins/bootstrap-xeditable/js/bootstrap-editable.js")}}" type="text/javascript"></script>
    <script src="{{asset("admin/assets/pages/jquery.xeditable.init.js")}}" type="text/javascript"></script>

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {

        })
    </script>
@endsection
