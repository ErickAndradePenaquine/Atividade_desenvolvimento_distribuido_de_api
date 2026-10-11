<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstoqueUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return ['nome' => 'sometimes|required|string|max:255', 'descricao' => 'sometimes|required|string|max:2000', 'quantidade' => 'sometimes|required|integer|min:0'];
    }
}
