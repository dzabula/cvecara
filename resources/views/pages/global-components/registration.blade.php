<form action="{{route('registration')}}" method="post" onsubmit="return Validate()">
    @csrf
    <div class="form-group">
        <input type="email" class="form-control" name="email-r" value="{{old('email-r')}}" id="r-email" placeholder="Email *">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password-r" value="{{old('password-r')}}" id="pass" value="" placeholder="Sifra *">
    </div>
    <div class="form-group">
        <input type="password" class="form-control"  id="pass2" value="{{old('password-r')}}" placeholder="Ponovite Sifru *">
    </div>
    <hr>
    <div class="form-group">
        <label class="container_radio" style="display: inline-block; margin-right: 15px;">Musko
            <input type="radio" name="gender" checked value="1">
            <span class="checkmark"></span>
        </label>
        <label class="container_radio" style="display: inline-block;">Zensko
            <input type="radio" name="gender" {{ old('gender') === '2' ? 'checked' : '' }} value="2">
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="private box">
        <div class="row no-gutters">
            <div class="col-6 pr-1">
                <div class="form-group">
                    <input type="text" id="firstName" class="form-control" value="{{old('first_name')}}" name="first_name" placeholder="Ime*">
                </div>
            </div>
            <div class="col-6 pl-1">
                <div class="form-group">
                    <input type="text" id="lastName" class="form-control" value="{{old('last_name')}}" name="last_name" placeholder="Prezime *">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input type="text" id="adress" class="form-control" name="adress" value="{{old('adress')}}" placeholder="Adresa *">
                </div>
            </div>
            <div class="col-12 ">
                <div class="form-group">
                    <input type="text" id="phone" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Telefon *">
                </div>
            </div>
        </div>
        <!-- /row -->
        <div class="row no-gutters">
            <div class="col-6 pr-1 ">
                <div class="form-group">
                    <div class="select-wraper custom-select-form">
                        <select class="select wide add_bottom_10" name="city" id="city">
                            <option value="0" selected>Grad *</option>
                            @foreach($data['cities'] as $city)

                            <option value="{{$city->id}}" {{ old('city') == $city->id ? 'selected' : '' }} >{{$city->city}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6 pl-1">
                <div class="form-group">
                    <input type="text" class="form-control" id="postal" name="postal" value="{{ old('postal')}}" placeholder="Postanski broji *">
                </div>
            </div>
        </div>
        <!-- /row -->


        <!-- /row -->

    </div>
    <hr>
    <div class="form-group">
        <p>Morate potvrditi uslove koriscenja da biste se registrovali!</p>
        <label class="container_check">Potvrdjujem <a href="#0">Uslovi koriscenja</a>
            <input id="privacy-police" type="checkbox" name="policy" {{ old('policy') == true ? 'checked' : '' }} onchange="EnableSubmitRegister()">
            <span class="checkmark"></span>
        </label>
    </div>

    <div class="text-center"><input type="submit"  value="Register" id="submit" class="btn_1 full-width"></div>
    <div id="errors"></div>
    
    @if(session("error-registration"))
        <p class="p-2 red-color">{{session("error-registration")}}</p>
    @elseif($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li class="p-2 red-color">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    
</form>