<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogInRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "email-l" => "required|exists:user,email",
            "password-l" => "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/i"
        ];
    }

    public function messages()
    {


        return [
            'email-l.required' => 'Email je obavezan',
            'email-l.exists' => 'Pogresan email',
            'password-l.required' => 'Sifra je obavezna',
            'password-l.regex' => 'Sifra mora sadrzati minimalno 8 slova, od toga jedno veliko slovo i jedan broji, bez specijalnih karaktera',
        ];
    }
}
