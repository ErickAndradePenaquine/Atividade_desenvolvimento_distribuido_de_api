<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstoqueStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return ['nome' => 'required|string|max:255', 'descricao' => 'required|string|max:2000', 'quantidade' => 'required|integer|min:0'];
    }
}
