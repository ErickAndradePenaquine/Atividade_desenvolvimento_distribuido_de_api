<?php

namespace App\Services;

use App\Models\Status;
use App\Repositories\StatusRepository;
use Illuminate\Database\Eloquent\Collection;

class StatusService
{
    public function __construct(private StatusRepository $statusRepository) {}
    public function get(): Collection
    {
        return $this->statusRepository->get();
    }
    public function store(array $data): Status
    {
        return $this->statusRepository->store($data);
    }
    public function details(int $id): Status
    {
        return $this->statusRepository->details($id);
    }
    public function update(int $id, array $data): Status
    {
        return $this->statusRepository->update($id, $data);
    }
    public function destroy(int $id): Status
    {
        return $this->statusRepository->destroy($id);
    }
}
