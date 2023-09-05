@extends("layout.layout")
@section("aditional_head")
    <link href="{{asset("asset/css/account.css")}}" rel="stylesheet">
@endsection
@section("title")
    Prijva-Registracija
@endsection
@section("keyword")
    PRva Druga Treca Cetvrta Peta
@endsection
@section("description")
    Opis stranice
@endsection

@section("content")

    <main class="bg_gray">

        <div class="container margin_30">
            <div class="page_header">
                <h1>Prijavi se ili kreiraj nov nalog</h1>
            </div>
            <!-- /page_header -->

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="client">Vec imam nalog</h3>
                        <div class="form_container">
                            <form action="{{route("loginUser")}}" method="post">
                                @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email-l" value="{{old('email')}}" id="email" placeholder="Email*">
                                @error('email-l')
                                <div class="red-color alert alert-danger error">{{ $message }}</div>
                                @enderror


                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control " value="" name="password-l" id="password_in" value="Visokaict1" placeholder="Password*">
                                @error('password-l')
                                <div class="red-color alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="clearfix add_bottom_15">
                                <!--
                                <div class="checkboxes float-left">
                                    <label class="container_check">Remember me
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                -->
                                <div class="float-right"><a id="forgot" href="javascript:void(0);">Zaboravili ste šifru?</a></div>
                            </div>
                            <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>

                                <p>{{session()->get("errors")}}</p>
                                @if(session()->get("error") != null)

                                    <div class="red-color alert alert-danger color-red">{{session()->get("error")}}</div>
                                @endif
                            </form>
                            <div id="forgot_pw">
                                <form action="{{route('sendMailToChangePassword')}}" method="POST">
                                    @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email_forgot" placeholder="Unesite vas email">
                                </div>
                                <p class="pl-3">Link za promenu lozinke ce biti instant poslat na vasu email adresu.</p>
                                    @if(session()->has("error-chpass"))
                                        <script>
                                            window.onload = () => {
                                                $("#forgot_pw").fadeToggle("fast");
                                            }
                                        </script>
                                        <div class="red-color alert alert-danger color-red"><p class="pl-3">{{session("error-chpass")}}</p></div>
                                    @endif
                                <div class="text-center">
                                    <input type="submit" value="Resetuj sifru" class="btn_1">
                                </div>

                                </form>






                            </div>


                        </div>
                        <!-- /form_container -->
                    </div>
                    <!-- /box_account -->
                    <div class="row">
                        <div class="col-md-6 d-none d-lg-block">
                            <ul class="list_ok">
                                <li>Bezbednost</li>
                                <li>Vasi podaci su eknriptovani</li>
                                <li>Vasi podaci se ne dele sa trecim licem</li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-none d-lg-block">
                            <ul class="list_ok">
                                <li>Dostava u roku od 3 radna dana</li>
                                <li>H24 Korisnicka podrska</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 ">
                    <div class="box_account ">

                        <div class="d-flex justify-content-between"> <h3 class="new_client">Novi nalog</h3> <small class="float-right pt-2">* Obavezna polja</small></div>
                        <div class="form_container">
                                            
                        @include("pages.global-components.registration")

                        </div>
                                   
                        <!-- /form_container -->
                    </div>
                    <!-- /box_account -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection
@section("aditionalScripts")
    <script>
        function RememberMe(){

        }
        function Validate(){

            var errors = [];

            var nameR = new RegExp(/^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/)
            var emailR = new RegExp(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)
            var passR = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/)
            var postalR = new RegExp(/^[0-9]{3,7}$/)
            var phoneR =new RegExp(/^([+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\.0-9]*){6,}$/)


            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var email = $("#r-email").val();
            var pass = $("#pass").val();
            var pass2 = $("#pass2").val();
            var city = $("#city").val();
            var postal = $("#postal").val();
            var adress = $("#adress").val();
            var phone = $("#phone").val();


            if(!nameR.test(firstName)){
                errors.push("Ime mora poceti velikim slovom i sadrzati najmanje dva slova");
            }
            if(!nameR.test(lastName)){
                errors.push("Prezime mora poceti velikim slovom i sadrzati najmanje dva slova");
            }
            if(!emailR.test(email)){
                errors.push("Email mora biti u formatu primer@gmail.com");
            }
            if(!postalR.test(postal)){
                errors.push("Postanski broji se mora sastojati samo od cifara");
            }
            if(!passR.test(pass)){
                errors.push("Sifra mora imati najmanje: osam karaktera, jedno veliko slovo, jedan broji. Bez specijalnih karaktera");
            }
            if(!phoneR.test(phone)){
                errors.push("Broji telefona mora biti u formatu +381 61 1357 236");
            }
            if(pass != pass2){
                errors.push("Lozinke se ne poklapaju");
            }
            if(city == 0){
                errors.push("Grad je obavezno polje");
            }
            if(adress.length < 4){
                errors.push("Adresa nije u ispravnom formatu")
            }

            if(errors.length > 0){
                var html = "<ul>";
                errors.forEach(e =>{
                    html+=`
                        <li class='p-2 alert-danger danger red-color'>
                            ${e}
                        </li>

                    `
                })
                html+="</ul>"
                $("#errors").html(html);
                return false
            }

            return true

        }
        function EnableSubmitRegister(){
            console.log("ok")
            var x = document.getElementById("privacy-police").checked;
            console.log(x)
            if(x){
                $("#submit").removeAttr("disabled");
                $("#submit").css("background-color","#004dda;");
            }else{
                $("#submit").attr("disabled",true);
                $("#submit").css("background-color","#c2c2c2;");

            }
        }
        // Client type Panel
        $('input[name="client_type"]').on("click", function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    </script>
@endsection
