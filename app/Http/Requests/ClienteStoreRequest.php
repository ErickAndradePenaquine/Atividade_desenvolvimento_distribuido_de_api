<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'cpf' => ['required', 'digits:11', Rule::unique('clientes', 'cpf')],
            'email' => ['required', 'email', 'max:255', Rule::unique('clientes', 'email')],
            'telefone' => 'required|string|max:20',
            'cep' => 'required|digits:8',
            'cidade' => 'sometimes|nullable|string|max:255',
            'bairro' => 'sometimes|nullable|string|max:255',
            'rua' => 'sometimes|nullable|string|max:255',
            'numero' => 'required|string|max:20',
            'referencia' => 'sometimes|nullable|string|max:255',
        ];
    }
}
