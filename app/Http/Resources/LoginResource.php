<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public static $wrap = null;

    /**
     * @return array{access_token: string, token_type: string, expires_in: int, usuario: UserResource}
     */
    public function toArray(Request $request): array
    {
        return [
            'access_token' => $this->resource['access_token'],
            'token_type' => $this->resource['token_type'],
            'expires_in' => $this->resource['expires_in'],
            'usuario' => new UserResource($this->resource['usuario']),
        ];
    }
}
