<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChamadoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'cliente_id' => 'sometimes|required|exists:clientes,id',
            'status_id' => 'sometimes|required|exists:status,id',
            'descricao_problema' => 'sometimes|required|string|max:5000',
            'descricao_solucao' => 'nullable|string|max:5000',
        ];
    }
}
