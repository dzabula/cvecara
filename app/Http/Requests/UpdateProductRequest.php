<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            "id" => "required|exists:product,id",
            "name" => "required|string|min:3",
            "price" => "required|string|min:2",
            "category" => "required|exists:category,id",
            "offer" => "required|numeric",
            "img" =>"image"
        ];
    }
}
