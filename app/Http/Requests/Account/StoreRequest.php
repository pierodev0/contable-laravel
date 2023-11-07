<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'type' => ['required'],
            'number' => ['required', 'unique:accounts,number'],
            'amount' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'type.required' => 'El campo tipo es obligatorio.',
            'number.required' => 'El numero de cuenta es obligatorio',
            'number.unique' => 'Ya existe una cuenta con ese número.',
            'amount.numeric' => 'El campo monto debe ser un valor numérico.',
            'amount.min' => 'El campo monto debe ser al menos 0.',
        ];
    }
}
