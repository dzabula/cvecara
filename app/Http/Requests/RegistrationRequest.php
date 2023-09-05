<?php

namespace App\Http\Requests;
use \App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

       return [
            "email-r" => "required",
            "password-r" => "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/i",
            "phone" => "required|regex:/^([+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\.0-9]*){6,}$/i",
            "gender" => "required|regex:/^[0-9]$/i",
            "postal" =>"required|regex:/^[0-9]{3,7}$/i",
            "adress" => "required|min:6",
            "city" => "required|exists:city,id"
        ];
       

    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Dobijanje trenutne instance zahteva
            $currentRequest = app('request');

            // Sada možete pristupiti trenutnom zahtevu
            $email = $currentRequest->input('email-r'); // Primer

            $phone = $currentRequest->input('phone'); // Primer

            $existEmail = User::where([["email",$email],["deleted_at",null],["active",1]])->count();
            $existPhone = User::where([["phone",$phone],["deleted_at",null],["active",1]])->count();
    
        

            if($existEmail > 0)
            {
                $validator->errors()->add('email', 'Vec postoji korisnik sa istom email adresom!');
                throw new ValidationException($validator);
            }
            else if($existPhone > 0)
            {
                $validator->errors()->add('phone', 'Vec postoji korisnik sa istim borjem telefona!');
                throw new ValidationException($validator);
            }
        });
    }

   
}
