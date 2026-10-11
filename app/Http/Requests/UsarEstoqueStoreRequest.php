<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsarEstoqueStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'estoque_id' => [
                'required',
                'exists:estoques,id',
                Rule::unique('usar_estoques', 'estoque_id')->where('chamado_id', $this->input('chamado_id')),
            ],
            'chamado_id' => 'required|exists:chamados,id',
        ];
    }
}
