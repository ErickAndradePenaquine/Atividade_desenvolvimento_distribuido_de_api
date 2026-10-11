<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusStoreRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Http\Resources\StatusResource;
use App\Services\StatusService;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    public function __construct(private StatusService $statusService) { }
    public function get(): JsonResponse { return StatusResource::collection($this->statusService->get())->response(); }
    public function store(StatusStoreRequest $request): JsonResponse { return (new StatusResource($this->statusService->store($request->validated())))->response()->setStatusCode(201); }
    public function details(int $id): JsonResponse { return (new StatusResource($this->statusService->details($id)))->response(); }
    public function update(StatusUpdateRequest $request, int $id): JsonResponse { return (new StatusResource($this->statusService->update($id, $request->validated())))->response(); }
    public function destroy(int $id): JsonResponse { $this->statusService->destroy($id); return response()->json(['message' => 'Status removido.']); }
}
