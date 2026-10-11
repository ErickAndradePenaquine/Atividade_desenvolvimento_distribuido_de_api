<?php

namespace App\Repositories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;

class StatusRepository
{
    public function get(): Collection
    {
        return Status::query()->orderBy('id')->get();
    }
    public function details(int $id): Status
    {
        return Status::query()->with('chamados')->findOrFail($id);
    }
    public function store(array $data): Status
    {
        return Status::query()->create($data);
    }
    public function update(int $id, array $data): Status
    {
        $status = Status::query()->findOrFail($id);
        $status->update($data);
        return $status->refresh();
    }
    public function destroy(int $id): Status
    {
        $status = Status::query()->findOrFail($id);
        $status->delete();
        return $status;
    }
}
