<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nombre"=> "required",
            "fechaVencimiento"=> "required",
            "precio"=> "required",
            "stock"=> "required",
        ];
    }
    public function messages(): array
    {
        return [
            "nombre.required"=> "Debe ingresar un nombre",
            "fechaVencimiento.required"=> "Debe ingresar una fecha de vencimiento",
            "precio.required"=> "Debe ingresar un precio",
            "stock.required"=> "Debe ingresar cantidad en stock",
        ];
    }
}
