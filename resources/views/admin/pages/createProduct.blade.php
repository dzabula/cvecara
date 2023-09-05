@extends("layout.layoutAdmin")
@section("aditionalHead")
    <link href="{{asset("admin/assets/plugins/bootstrap-xeditable/css/bootstrap-editable.css")}}" rel="stylesheet" />

@endsection
@section("content")

    <div class="container-fluid">
        <div class="page-head">
            <h4 class="mt-2 mb-2">Kreiranje proizvoda</h4>
            @if($data['status'] == 1 )
                <div class="alert alert-success" role="alert">
                    Uspesno ste kreirali proizvod
                </div>
            @elseif($data['status'] == 0)
                <div class="alert alert-danger" role="alert">
                    Trenutno nije moguce kreirati proizvod pokusajte kasnije.
                </div>
            @endif
        </div>

        <form id="update-form" action="{{route("store-product")}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">


                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="header-title pb-3">Novi proizvod</h5>
                            <div class="card-box">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>

                                            <td width="35%">Naziv:</td>

                                            <td width="65%"><input type="text" class="w-100 p-1" name="name" /></td>
                                        </tr>
                                        <tr>
                                            <td>Cena:</td>
                                            <td><input type="text" class="p-1"  name="price" /></td>
                                        </tr>
                                        <tr>
                                            <td>Podkategorija</td>
                                            <td>
                                                <select name="category" class="form-control input-sm">

                                                    @foreach($data['all_categories'] as $c)

                                                        @if($c->Parent != null)
                                                                <option value="{{$c->id}}" >{{$c->Parent->category}} - {{$c->category}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Popust</td>
                                            <td>
                                                <select name="offer" class="form-control input-sm">
                                                    <option value="0">Bez popusta</option>
                                                    @foreach($data['all_offers'] as $o)
                                                                <option value="{{$o->id}}" >{{$o->offer}} - {{$o->amount}}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                        </tr>


                                        <tr>
                                            <td><div class="d-flex flex-column">
                                                    <p>Slika:</p>
                                                </div></td>
                                            <td>
                                                <input type="file" name="image" />

                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5 d-flex w-100 justify-content-center">
                    <button type="submit" id="save-changes" class="btn btn-success">
                        <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="d-none visually-hidden">Ucitavanje...</span>
                        Kreiraj</button>
                </div>

            </div>

        </form>
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
