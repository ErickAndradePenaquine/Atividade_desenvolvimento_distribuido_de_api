<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChamadoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cliente_id' => $this->cliente_id,
            'status_id' => $this->status_id,
            'tecnico_id' => $this->tecnico_id,
            'descricao_problema' => $this->descricao_problema,
            'descricao_solucao' => $this->descricao_solucao,
            'cliente' => new ClienteResource($this->whenLoaded('cliente')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'tecnico' => new UserResource($this->whenLoaded('tecnico')),
            'usos_estoque' => UsarEstoqueResource::collection($this->whenLoaded('usosEstoque')),
        ];
    }
}
