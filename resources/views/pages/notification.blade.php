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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>

                </div>
                <div class="modal-body">
                    {{$data['notification']}}

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <a href="#" class="btn btn-primary p-3" id="return-back">Idi nazad</a>
                    @if(session()->has("user") && session()->get("user")->role == "admin")
                        <a href="{{route("dashboard")}}" class="btn btn-primary p-3">Idi na pocetnu stranicu</a>
                    @else
                        <a href="{{route("home")}}" class="btn btn-primary p-3">Idi na pocetnu stranicu</a>
                    @endif
                </div>
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

<style>
    #return-back{
        cursor: pointer;
    }
</style>

@endsection
@section("aditionalScripts")
    <script>
        // Proverava se da li je korisnik na pogresio unos podataka na stranici za vracanje lozinke. Jer da bi se
        //se vratio na prethodnu stranicu potrban mu je post metod
        $("#return-back").click(function (){
            @if(!session()->has("agreeChangePassword"))
                if(document.referrer == ""){
                    window.location.href = '{{route("login")}}'
                }else {
                    window.location.href = document.referrer
                }
            @else
                var url = document.referrer
                var form = $('<form action="' + url + '" method="post">' +
                    '   <input type="hidden" name="changePassword" value="{{session()->get("agreeChangePassword")['token']}}"/>' +
                   ' <input type="hidden" name="email" value="{{session()->get("agreeChangePassword")['email']}}" />' +
                    '</form>');
                $('body').append(form);
                form.submit();
            @endif
        })

    </script>
@endsection
