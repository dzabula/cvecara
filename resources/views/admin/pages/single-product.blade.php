@extends("layout.layoutAdmin")
@section("aditionalHead")
    <link href="{{asset("admin/assets/plugins/bootstrap-xeditable/css/bootstrap-editable.css")}}" rel="stylesheet" />

@endsection
@section("content")

    <div class="container-fluid">
    <div class="page-head">
        <h4 class="mt-2 mb-2">Izmena proizvoda</h4>
    </div>
        <form id="delete-form" action="{{route("delete-products")}}" method="POST">
            @method("post")
            @csrf

        </form>
        <form id="redelete-form" action="{{route("redelete-product")}}" method="POST">
            @method("post")
            @csrf
        </form>
        <form id="update-form" action="{{route("update-product")}}" enctype="multipart/form-data" method="POST">

            <input type="hidden" name="id" value="{{$data['product']->id}}"/>
            @csrf
            <div class="row">


        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">{{$data['product']->name}}</h5>
                    <div class="card-box">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <td width="35%">ID</td>
                                <td width="65%">{{$data['product']->id}}</td>
                            </tr>
                            <tr>

                                <td width="35%">Naziv</td>

                                <td width="65%"><a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{$data['product']->name}}</a></td>
                            </tr>
                            <tr>
                                <td>Cena</td>
                                <td><a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname">{{$data['product']->Price[0]->price}}</a> RSD</td>
                            </tr>
                            <tr>
                                <td>Podkategorija</td>
                                <td>
                                    <select name="category" class="form-control input-sm">

                                        @foreach($data['all_categories'] as $c)

                                            @if($c->Parent != null)
                                                @if($data['product']->Categories->id == $c->id)
                                                    <option value="{{$c->id}}" selected>{{$c->Parent->category}} - {{$c->category}}</option>
                                                @else
                                                    <option value="{{$c->id}}" >{{$c->Parent->category}} - {{$c->category}}</option>
                                                @endif

                                            @endif
                                        @endforeach
                                    </select>

                                </td>
                            </tr>
                            <tr>

                                <td>Popust</td>
                                <td>
                                    <select name="offer" class="form-control input-sm">
                                        <option value="0" @if(count($data['product']->ProductOffer) == 0 ) selected @endif>Bez popusta</option>
                                        @foreach($data['all_offers'] as $o)

                                                @if(count($data['product']->ProductOffer) > 0 && $data['product']->Offer[0]->id == $o->id)
                                                    <option value="{{$o->id}}" selected>{{$o->offer}} - {{$o->amount}}%</option>
                                                @else
                                                    <option value="{{$o->id}}" >{{$o->offer}} - {{$o->amount}}%</option>
                                                @endif

                                        @endforeach
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>Datum kreiranja</td>
                                <td>{{date("Y-m-d", strtotime($data['product']->created_at))}}</td>
                            </tr>
                            <tr>
                                <td>Datum brisanja</td>
                                <td>@if($data['product']->deleted_at == null) Nije izbrisano @else {{date("Y-m-d", strtotime($data['product']->deleted_at))}}@endif</td>
                            </tr>
                            <tr>

                                @if($data['product']->deleted_at == null)
                                <td>Obrisi</td>
                                <td>
                                        <button type="button" id="submit-delete-form" name="id" value="{{$data['product']->id}}" class="delete btn btn-danger">Obrisi</button>

                                </td>
                                @else
                                    <td>Vrati na stanje</td>
                                    <td>
                                            <button type="button" id="submit-redelete-form" name="id" value="{{$data['product']->id}}" class="delete btn btn-danger">Vrati na stanje</button>

                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td><div class="d-flex flex-column">
                                        <p>Slika:</p>
                                        <img class="img-of-product" src="{{asset("asset/img/".$data['product']->src)}}" />
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
            <button type="button" id="save-changes" class="btn btn-success">
                <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="d-none visually-hidden">Ucitavanje...</span>
                Sacuvaj promene</button>
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
            $("#submit-delete-form").click(function (){
                let id = $(this).val();
                let html = `<input type="hidden" name="id" value="${id}" />`;
                $("#delete-form").append(html);
                $("#delete-form").submit();
            })

            $("#submit-redelete-form").click(function (){
                let id = $(this).val();
                let html = `<input type="hidden" name="id" value="${id}" />`;
                $("#redelete-form").append(html);
                $("#redelete-form").submit();
            })

            $("#save-changes").click(function () {
                $(".spinner-border").each(function () {
                    $(this).removeClass("d-none");
                })

                $(".visually-hidden").each(function () {
                    $(this).removeClass("d-none");
                })
                let name = $("#inline-username").text();
                let price = $("#inline-firstname").text();
                let html = `<input type="hidden" name="name" value="${name}"> <input type="hidden" name="price" value="${price}">`
                $("#update-form").append(html)

                $("#update-form").submit();
            })
        })
    </script>
@endsection
