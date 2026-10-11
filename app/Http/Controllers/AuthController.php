<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $login = $this->authService->login($credentials['usuario'], $credentials['password']);

        if ($login === null) {
            return response()->json(['message' => 'Usuário ou senha inválidos.'], 401);
        }

        return (new LoginResource($login))->response();
    }

    public function me(): JsonResponse
    {
        return (new UserResource(auth('api')->user()))->response();
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();
        return response()->json(['message' => 'Sessão encerrada.']);
    }
}
