<?php

namespace App\Services;

use App\Models\Estoque;
use App\Repositories\EstoqueRepository;
use Illuminate\Database\Eloquent\Collection;

class EstoqueService
{
    public function __construct(private EstoqueRepository $estoqueRepository) {}
    public function get(): Collection
    {
        return $this->estoqueRepository->get();
    }
    public function store(array $data): Estoque
    {
        return $this->estoqueRepository->store($data);
    }
    public function details(int $id): Estoque
    {
        return $this->estoqueRepository->details($id);
    }
    public function update(int $id, array $data): Estoque
    {
        return $this->estoqueRepository->update($id, $data);
    }
    public function destroy(int $id): Estoque
    {
        return $this->estoqueRepository->destroy($id);
    }
}
