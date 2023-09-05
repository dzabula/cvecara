@extends("layout.layout")
@section("aditional_head")
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section("title")
    Porucivanje
@endsection
@section("keyword")
    PRva Druga Treca Cetvrta Peta
@endsection
@section("description")
    Opis stranice
@endsection

@section("content")
    <div class="container">
        <form>
            @csrf
            <div class="form-group">
                <input type="email" class="form-control" name="email-r" value="markodasic700@gmail.com" id="r-email" placeholder="Email *">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password-r" value="Visokaict1" id="pass" value="" placeholder="Sifra *">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"  id="pass2" value="Visokaict1" placeholder="Ponovite Sifru *">
            </div>
            <hr>
            <div class=" form-group row no-gutters">
                <div class="col-6 pl-1 ">
                    <div class="form-group">
                        <div class="select-wraper custom-select-form">
                            <select class="select wide add_bottom_10" name="city" id="city">
                                <option value="0" selected>Grad *</option>
                                @if($errors->any())
                                    @foreach($data['cities'] as $city)
                                        @if($city->id == old("city"))
                                            <option value="{{$city->id}}" selected>{{$city->city}}</option>
                                        @else
                                            <option value="{{$city->id}}" >{{$city->city}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($data['cities'] as $city)
                                        <option value="{{$city->id}}">{{$city->city}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6 pl-1">
                    <div class="form-group">
                        <input type="text" class="form-control" id="postal" name="postal" value="00011" placeholder="Postanski broji *">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="select-wraper custom-select-form">
                    <select class="select wide add_bottom_10" name="city" id="city">
                        <option value="0" selected>Grad *</option>
                        @if($errors->any())
                            @foreach($data['cities'] as $city)
                                @if($city->id == old("city"))
                                    <option value="{{$city->id}}" selected>{{$city->city}}</option>
                                @else
                                    <option value="{{$city->id}}" >{{$city->city}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($data['cities'] as $city)
                                <option value="{{$city->id}}">{{$city->city}}</option>
                            @endforeach
                        @endif

                    </select>
                </div>
            </div>

        </form>
    </div>
@endsection
@section("aditionalScripts")

    <script>
        var urlToCupon = "{{route("cupon")}}"
        var urlToGetCart = "{{route("cart")}}";

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
