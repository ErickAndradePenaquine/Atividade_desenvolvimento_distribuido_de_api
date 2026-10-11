<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChamadoStoreRequest;
use App\Http\Requests\ChamadoUpdateRequest;
use App\Http\Resources\ChamadoResource;
use App\Services\ChamadoService;
use Illuminate\Http\JsonResponse;

class ChamadoController extends Controller
{
    public function __construct(private ChamadoService $chamadoService) { }
    public function get(): JsonResponse { return ChamadoResource::collection($this->chamadoService->get())->response(); }

    public function store(ChamadoStoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['tecnico_id'] = auth('api')->id();
        return (new ChamadoResource($this->chamadoService->store($data)))->response()->setStatusCode(201);
    }

    public function details(int $id): JsonResponse { return (new ChamadoResource($this->chamadoService->details($id)))->response(); }
    public function update(ChamadoUpdateRequest $request, int $id): JsonResponse { return (new ChamadoResource($this->chamadoService->update($id, $request->validated())))->response(); }
    public function destroy(int $id): JsonResponse { $this->chamadoService->destroy($id); return response()->json(['message' => 'Chamado removido.']); }
}
