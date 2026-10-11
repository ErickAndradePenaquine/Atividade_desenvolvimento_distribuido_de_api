<?php

namespace App\Repositories;

use App\Models\Chamado;
use Illuminate\Database\Eloquent\Collection;

class ChamadoRepository
{
    public function get(): Collection
    {
        return Chamado::query()->with(['cliente', 'status', 'tecnico', 'usosEstoque.estoque'])->latest()->get();
    }
    public function details(int $id): Chamado
    {
        return Chamado::query()->with(['cliente', 'status', 'tecnico', 'usosEstoque.estoque'])->findOrFail($id);
    }
    public function store(array $data): Chamado
    {
        return Chamado::query()->create($data);
    }
    public function update(int $id, array $data): Chamado
    {
        $chamado = $this->details($id);
        $chamado->update($data);
        return $chamado->refresh()->load(['cliente', 'status', 'tecnico', 'usosEstoque.estoque']);
    }
    public function destroy(int $id): Chamado
    {
        $chamado = $this->details($id);
        $chamado->delete();
        return $chamado;
    }
}
