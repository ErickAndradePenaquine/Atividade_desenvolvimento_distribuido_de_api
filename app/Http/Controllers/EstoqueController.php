<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstoqueStoreRequest;
use App\Http\Requests\EstoqueUpdateRequest;
use App\Http\Resources\EstoqueResource;
use App\Services\EstoqueService;
use Illuminate\Http\JsonResponse;

class EstoqueController extends Controller
{
    public function __construct(private EstoqueService $estoqueService) {}

    public function get(): JsonResponse
    {
        return EstoqueResource::collection($this->estoqueService->get())->response();
    }

    public function store(EstoqueStoreRequest $request): JsonResponse
    {
        return (new EstoqueResource(
        $this->estoqueService
        ->store($request->validated())))
        ->response()
        ->setStatusCode(201);
    }

    public function details(int $id): JsonResponse
    {
        return (new EstoqueResource(
            $this->estoqueService
            ->details($id)))
            ->response();
    }

    public function update(EstoqueUpdateRequest $request, int $id): JsonResponse
    {
        return (new EstoqueResource(
            $this->estoqueService
            ->update($id, $request->validated())))
            ->response();
    }

    public function destroy(int $id): JsonResponse
    {
        $this->estoqueService->destroy($id);
        return response()->json(['message' => 'Item de estoque removido.']);
    }
}
