<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @return array{access_token: string, token_type: string, expires_in: int, usuario: User}|null
     */
    public function login(string $usuario, string $password): ?array
    {
        $user = $this->userRepository->findByLogin($usuario);

        if ($user === null || ! Hash::check($password, $user->senha)) {
            return null;
        }

        return [
            'access_token' => JWTAuth::fromUser($user),
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'usuario' => $user,
        ];
    }

    public function logout(): void
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }
}
