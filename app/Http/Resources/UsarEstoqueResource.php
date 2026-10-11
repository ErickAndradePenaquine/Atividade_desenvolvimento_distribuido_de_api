<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsarEstoqueResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'estoque_id' => $this->estoque_id,
            'chamado_id' => $this->chamado_id,
            'estoque' => new EstoqueResource($this->whenLoaded('estoque')),
        ];
    }
}
