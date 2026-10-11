<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsarEstoqueStoreRequest;
use App\Http\Resources\UsarEstoqueResource;
use App\Services\UsarEstoqueService;
use Illuminate\Http\JsonResponse;

class UsarEstoqueController extends Controller
{
    public function __construct(private UsarEstoqueService $usarEstoqueService) { }
    public function get(): JsonResponse { return UsarEstoqueResource::collection($this->usarEstoqueService->get())->response(); }
    public function store(UsarEstoqueStoreRequest $request): JsonResponse { return (new UsarEstoqueResource($this->usarEstoqueService->store($request->validated())))->response()->setStatusCode(201); }
    public function details(int $id): JsonResponse { return (new UsarEstoqueResource($this->usarEstoqueService->details($id)))->response(); }
    public function destroy(int $id): JsonResponse { $this->usarEstoqueService->destroy($id); return response()->json(['message' => 'Vínculo com o estoque removido.']); }
}
