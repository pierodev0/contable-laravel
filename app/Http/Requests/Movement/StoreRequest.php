<?php

namespace App\Http\Requests\Movement;

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
            'amount' => ['required','numeric','min:0','not_in:0'],
            'account_id' => ['required']
        ];
    }
    public function messages()
{
    return [
        'amount.required' => 'El campo monto es obligatorio.',
        'amount.numeric' => 'El campo monto debe ser un valor numérico.',
        'amount.min' => 'El monto no debe ser menor a 0',
        'not_in' => 'El monto no puede ser 0',
        'account_id.required' => 'Seleccione una cuenta para hacer el movimiento'
    ];
}
}
