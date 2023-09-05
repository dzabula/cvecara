<?php

namespace App\Http\Controllers;


use App\Http\Controllers\admin\AdminController;
use App\Mail\Verification;
use App\Mail\ChangePassword;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Http\Request;
use \App\Http\Requests\LogInRequest;
use \App\Http\Requests\RegistrationRequest;
use \App\Models\User;
use \App\Models\Statistic;
use \App\Models\City;
use \App\Models\Adress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LoginController extends HomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view("pages.login",["data" => $this->data]);
    }

    public function changePasswordForm()
    {
        return view("pages.changePassword",["data" => $this->data]);
    }

    public function login(Request $request)
    {

        //$password = Hash::make($request->post("password"));
        try {
            $password = md5($request->post("password-l"));
            $obj = User::where([["email", $request->post("email-l")], ["password", $password], ["active", "1"]])->first();

            if($obj != null) {

                $obj->adress = $obj->Adress->adress;
                $obj->postalcode = $obj->Adress->postalcode;
                $obj->city = $obj->Adress->City->city;
                $obj->id_city = $obj->Adress->City->id;
                $obj->role = $obj->Role->role;


                session()->put("user", $obj);

                $statisticModel = new Statistic();

                $statisticModel->SaveAction($obj->id,"Logovanje");
                $user = new User();
                $this->data['cart'] = $user->ProductsInChart($obj->id);



                if($obj->Role->role == "admin"){

                    return redirect('dashboard');
                }

                return view("pages.home", ['data' => $this->data]);
            }else{

                $request->session()->put("problem","problems");

               // return $this->index();
                return redirect()->back()->with("error", "Wrong Email or Password ");
            }
        }catch (\Exception $e){
            dd($e->getMessage());
            dd($e->getMessage()." OVde");
            \Log::error($e->getMessage());
            $request->session()->put("problem","problems");
            return view("pages.login",["data" => $this->data]);
        }

    }



    public function logout(Request $request){
        if($request->session()->has("user")){
            $request->session()->remove("user");
        }
        return view("pages.home",["data"=> $this->data]);
    }

    public function registration(RegistrationRequest $request)
    {
      

        try {

            $arr = $request->all();

            foreach ($arr as $i => $el) {
                $arr[$i] = htmlspecialchars($el);
            }
            DB::beginTransaction();


            $id_adress = Adress::create([
                "postalcode" => $arr['postal'],
                "adress" => $arr['adress'],
                "id_city" => $arr['city']
            ]);
            $faker = \Faker\Factory::create();
            $actv_link = md5($faker->word.$faker->word);
            $change_password = md5($faker->word.$faker->word);


            $password = md5($arr["password-r"]);
            $user = User::create([
                "first_name" => $arr["first_name"],
                "last_name" => $arr["last_name"],
                "email" =>$arr["email-r"],
                "password" => $password,
                "phone" => $arr["phone"],
                "activation_link" => $actv_link,
                "change_password" => $change_password,
                'id_adress' => $id_adress->id,
                "gender" => $arr["gender"],
                "active" => 1
            ]);
            try {
                Mail::to($user->email)->send(new Verification($user->first_name, $actv_link));
                $this->data['notification'] = "Uspeno ste se registrovali, potrebno je jos samo da potvrdite vasu e-adresu!";

            }catch(\Exception $e){
                $this->data['notification'] = "Uspeno ste se registrovali, ali Vam mejl nije uspesno poslat na vasu e-adresu! Nalog vam je stoga aktivan. Mozete se ulogovati";

            }

            $statisticModel = new Statistic();

            $statisticModel->SaveAction($user->id,"Registracija");

            DB::commit();


            return view("pages.notification",['data' => $this->data]);

        }catch (\Exception $e){

            DB::rollBack();

            Log::error($e->getMessage());

          //  return back()->with("error-registration","Doslo je do greske pokusajte opet");
            return back()->with("error-registration","Doslo je do greske na serveru. Molim vas poksajte ponovo.");
        }


    }

    //Aktivacija naloga putem emaila
    public function activation(Request $request)
    {
        try {
            $obj = DB::table("user")->where("activation_link", $request->post("activation_link"))->first();

            if ($obj) {
                $faker = \Faker\Factory::create();
                $this->data['notification'] = "Vas nalog je aktiviran sada se mozete ulogovati!";
                DB::table("user")->where("activation_link", $request->post("activation_link"))
                ->update([
                    "active"=>1,
                    "activation_link" => md5($faker->word)
                ]);
                return view("pages.notification", ['data' => $this->data]);
            } else {
                $this->data['notification'] = "Vas link je istekao pokusajte ponovo!";
                return view("pages.notification", ['data' => $this->data]);

            }
        }catch (\Exception $e){
            $this->data['notification'] = "Nesto nije u redu pokusajte ponovo kasnije!";
            Log::error($e->getMessage());
            return view("pages.notification", ['data' => $this->data]);
        }
    }


    // Slanje mejla za potvrdu davanje forme za kreiranje nove lozinke
    public function sendMailToChangePassword(Request $request)
    {
        try{

            $bool = User::where("email", $request->post("email"))->first();
            if($bool){
                $key = DB::table("user")->where("email",$request->post("email"))->select(["first_name","change_password"])->first();

                Mail::to($request->post("email"))->send(new ChangePassword($request->post("email"),$key->change_password,$key->first_name));

                $this->data['notification'] = "Poslali smo vam na emial dalja uputstva za promenu lozinke.";
                return view("pages.notification",["data" => $this->data]);

            }else{
                return back()->with("error-chpass","Uneti email ne postoji!");

            }
        }catch (\Exception $e){
          //  return back()->with("error-chpass","Nesto je poslo naopako, pokusajte kasnije");
            return back()->with("error-chpass",$e->getMessage());
        }

    }

    //nakon klika na link u mjelu korinisk stize ovde i ovo ga proverava i vraca mu formu
    public function changePassword(Request $request){
        try{

           $obj =  DB::table("user")->where("change_password", $request->input("changePassword"))->where("email",$request->input("email"))->first();

           if($obj){
                session()->put("agreeChangePassword",["email" => $request->input("email"), "token" => $request->input("changePassword")]);
                return view("pages.changePassword",['data' => $this->data]);
           }else{
               $this->data['notification'] = "Nazalost vas link za promenu lozinke je istekao pokusajte ponovo";
               return view("pages.notification",['data' => $this->data]);
           }

        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $this->data['notification'] = "Doslo je do grese. Molimo pokusajte kasnije. Gresja je:".$e->getMessage();
            return view("pages.notification",['data' => $this->data]);
        }
    }

    //Konacna promena lozinke
    public function applyChangePassword(Request $request){
        $pass1 = $request->post("password1");
        $pass2 = $request->post("password2");
        if(session()->has("agreeChangePassword")){
            $rege = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
            if(preg_match($rege,$pass1) && $pass1 == $pass2){
                $pass1 = md5($pass1);
                $str = rand().rand().rand();
                $newChangePasswordCode = md5($str);

                User::where("email",session()->get("agreeChangePassowrd"))->update(['password' => $pass1, "change_password" => $newChangePasswordCode]);
                $this->data['notification'] = "Cestitamo. Uspesno ste promenili lozinku.";
                session()->remove("agreeChangePassword");
                return view("pages.notification", ['data' => $this->data]);
            }else{
                $this->data['notification'] = "Lozinke se ne podudaraju ili nisu ispravnog formata. Lozinka mora sadrzati minimum jedno veliko, jedno malo slovo i jedan broji. Minalna duzina lozinke mora biti 8 karaktera. Pristupite linku ponovo kroz e-poruku koju ste dobili.";
                session()->remove("agreeChangePassword");
                return view("pages.notification",['data' => $this->data]);
            }
        }else{

            $this->data['notification'] = "Doslo je do greske. Pokusajte ponovo kasnije.";
            return view("pages.notification",['data' => $this->data]);
        }
    }
}
