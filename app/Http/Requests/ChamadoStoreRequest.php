<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChamadoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'status_id' => 'required|exists:status,id',
            'descricao_problema' => 'required|string|max:5000',
            'descricao_solucao' => 'nullable|string|max:5000',
        ];
    }
}
