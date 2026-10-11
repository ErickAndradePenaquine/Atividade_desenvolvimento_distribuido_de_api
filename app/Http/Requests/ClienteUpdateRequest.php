<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'nome' => 'sometimes|required|string|max:255',
            'cpf' => ['sometimes', 'required', 'digits:11', Rule::unique('clientes', 'cpf')->ignore($this->route('id'))],
            'email' => ['sometimes', 'required', 'email', 'max:255', Rule::unique('clientes', 'email')->ignore($this->route('id'))],
            'telefone' => 'sometimes|required|string|max:20',
            'cep' => 'sometimes|required|digits:8',
            'cidade' => 'sometimes|nullable|string|max:255',
            'bairro' => 'sometimes|nullable|string|max:255',
            'rua' => 'sometimes|nullable|string|max:255',
            'numero' => 'sometimes|required|string|max:20',
            'referencia' => 'sometimes|nullable|string|max:255',
        ];
    }
}
