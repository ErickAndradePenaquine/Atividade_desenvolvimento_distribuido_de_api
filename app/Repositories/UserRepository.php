<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function findByLogin(string $usuario): ?User
    {
        $cpf = preg_replace('/\D/', '', $usuario) ?? $usuario;

        return User::query()
            ->where('email', $usuario)
            ->orWhere('cpf', $cpf)
            ->first();
    }
}
