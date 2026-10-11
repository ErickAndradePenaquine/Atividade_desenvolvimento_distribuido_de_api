<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;

class ClienteRepository
{
    public function get(): Collection
    {
        return Cliente::query()->orderBy('nome')->get();
    }

    public function details(int $id): Cliente
    {
        return Cliente::query()->findOrFail($id);
    }

    public function store(array $data): Cliente
    {
        return Cliente::query()->create($data);
    }

    public function update(int $id, array $data): Cliente
    {
        $cliente = $this->details($id);
        $cliente->update($data);
        return $cliente->refresh();
    }

    public function destroy(int $id): Cliente
    {
        $cliente = $this->details($id);
        $cliente->delete();
        return $cliente;
    }
}
