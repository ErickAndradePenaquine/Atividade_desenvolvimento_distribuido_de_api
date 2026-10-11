<?php

namespace App\Repositories;

use App\Models\UsarEstoque;
use Illuminate\Database\Eloquent\Collection;

class UsarEstoqueRepository
{
    public function get(): Collection
    {
        return UsarEstoque::query()->with(['estoque', 'chamado'])->latest()->get();
    }
    public function details(int $id): UsarEstoque
    {
        return UsarEstoque::query()->with(['estoque', 'chamado'])->findOrFail($id);
    }
    public function store(array $data): UsarEstoque
    {
        return UsarEstoque::query()->create($data)->load(['estoque', 'chamado']);
    }
    public function destroy(int $id): UsarEstoque
    {
        $uso = $this->details($id);
        $uso->delete();
        return $uso;
    }
}
