<?php

namespace App\Repositories;

use App\Models\Estoque;
use Illuminate\Database\Eloquent\Collection;

class EstoqueRepository
{
    public function get(): Collection
    {
        return Estoque::query()->orderBy('nome')->get();
    }
    public function details(int $id): Estoque
    {
        return Estoque::query()->findOrFail($id);
    }
    public function store(array $data): Estoque
    {
        return Estoque::query()->create($data);
    }
    public function update(int $id, array $data): Estoque
    {
        $estoque = $this->details($id);
        $estoque->update($data);
        return $estoque->refresh();
    }
    public function destroy(int $id): Estoque
    {
        $estoque = $this->details($id);
        $estoque->delete();
        return $estoque;
    }
}
