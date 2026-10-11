<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'cep' => $this->cep,
            'cidade' => $this->cidade,
            'bairro' => $this->bairro,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'referencia' => $this->referencia,
        ];
    }
}
