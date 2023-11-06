<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'ruc' => 'required|numeric|unique:clients,ruc|digits:11',
            'direction' => 'nullable|string|max:255|unique:clients,direction|',
            'phone' => 'nullable|string|digits:9|unique:clients,phone|',
            'email' => 'nullable|string|email|max:50|unique:clients,email|',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe exceder los 255 caracteres.',
            'ruc.required' => 'El campo RUC es obligatorio.',
            'ruc.numeric' => 'El campo RUC debe ser un número.',
            'ruc.unique' => 'El RUC ingresado ya está registrado.',
            'ruc.digits' => 'El RUC debe tener 11 dígitos.',
            'direction.string' => 'El campo dirección debe ser una cadena de texto.',
            'direction.max' => 'El campo dirección no debe exceder los 255 caracteres.',
            'direction.unique' => 'La dirección ingresada ya está registrada.',
            'phone.string' => 'El campo teléfono debe ser una cadena de texto.',
            'phone.digits' => 'El teléfono debe tener 9 dígitos.',
            'phone.unique' => 'El teléfono ingresado ya está registrado.',
            'email.string' => 'El campo correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El campo correo electrónico no debe exceder los 50 caracteres.',
            'email.unique' => 'El correo electrónico ingresado ya está registrado.',
        ];
    }
}
