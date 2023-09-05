@extends("layout.layout")

@section("title")
    Uspesna registracija
@endsection
@section("keyword")
    PRva Druga Treca Cetvrta Peta
@endsection
@section("description")
    Opis stranice
@endsection

@section("content")

    <div class="my-5 col-12 col-lg-8 offset-lg-2 col-md-6 offset-md-3">
        <div class="modal-content">
           <form action="{{route("applyChangePassword")}}" method="post">
                @csrf
               <div class="form-group">
                   <input type="password" class="form-control " value="" name="password1" id="password_in" value="{{old("password1")}}" placeholder="Sifra *">
               </div>
               <div class="form-group">
                   <input type="password" class="form-control" name="password2" value="{{old("password2")}}" id="email" placeholder="Potvrdite sifru *">
               </div>
               <div class="form-group">
                   @if(session()->has("error-chpass"))
                       <div class="red-color alert alert-danger">{{ session()->get("error-chpass") }}</div>
                   @endif
                   <input type="submit" value="Potvrdi"/>
               </div>
           </form>

        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>


@endsection
@section("aditionalScripts")

@endsection
