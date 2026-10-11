<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatusUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return ['nome' => ['sometimes', 'required', 'string', 'max:100', Rule::unique('status', 'nome')->ignore($this->route('id'))]];
    }
}
