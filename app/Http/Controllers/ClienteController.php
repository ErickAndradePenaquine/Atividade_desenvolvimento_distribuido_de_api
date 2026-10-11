<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteStoreRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Http\Resources\ClienteResource;
use App\Services\ClienteService;
use Illuminate\Http\JsonResponse;

class ClienteController extends Controller
{
    public function __construct(private ClienteService $clienteService) { }
    public function get(): JsonResponse { return ClienteResource::collection($this->clienteService->get())->response(); }
    public function store(ClienteStoreRequest $request): JsonResponse { return (new ClienteResource($this->clienteService->store($request->validated())))->response()->setStatusCode(201); }
    public function details(int $id): JsonResponse { return (new ClienteResource($this->clienteService->details($id)))->response(); }
    public function update(ClienteUpdateRequest $request, int $id): JsonResponse { return (new ClienteResource($this->clienteService->update($id, $request->validated())))->response(); }
    public function destroy(int $id): JsonResponse { $this->clienteService->destroy($id); return response()->json(['message' => 'Cliente removido.']); }
}
