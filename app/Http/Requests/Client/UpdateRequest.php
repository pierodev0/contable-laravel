<?php

namespace App\Http\Requests\Client;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Client;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'ruc' => ['required', 'numeric', 'digits:11', Rule::unique(Client::class)->ignore($this->route('client')->id)],
            'direction' => 'nullable|string|max:255',
            'phone' => ['nullable', 'string', 'digits:9', Rule::unique(Client::class)->ignore($this->route('client')->id)],
            'email' => ['nullable', 'string', 'email', 'max:50', Rule::unique(Client::class)->ignore($this->route('client')->id)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'ruc.required' => 'El RUC es obligatorio.',
            'ruc.numeric' => 'El RUC debe ser un número.',
            'ruc.digits' => 'El RUC debe tener 11 dígitos.',
            'ruc.unique' => 'El RUC ya está registrado en la base de datos.',
            'direction.string' => 'La dirección debe ser una cadena de texto.',
            'direction.max' => 'La dirección no puede tener más de 255 caracteres.',
            'phone.string' => 'El teléfono debe ser una cadena de texto.',
            'phone.digits' => 'El teléfono debe tener 9 dígitos.',
            'phone.unique' => 'El teléfono ya está registrado en la base de datos.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.max' => 'El correo electrónico no puede tener más de 50 caracteres.',
            'email.unique' => 'El correo electrónico ya está registrado en la base de datos.',
        ];
    }
    
}
