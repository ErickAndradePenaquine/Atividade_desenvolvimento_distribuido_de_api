<?php

namespace App\Services;

use App\Models\UsarEstoque;
use App\Repositories\UsarEstoqueRepository;
use Illuminate\Database\Eloquent\Collection;

class UsarEstoqueService
{
    public function __construct(private UsarEstoqueRepository $usarEstoqueRepository) {}
    public function get(): Collection
    {
        return $this->usarEstoqueRepository->get();
    }
    public function store(array $data): UsarEstoque
    {
        return $this->usarEstoqueRepository->store($data);
    }
    public function details(int $id): UsarEstoque
    {
        return $this->usarEstoqueRepository->details($id);
    }
    public function destroy(int $id): UsarEstoque
    {
        return $this->usarEstoqueRepository->destroy($id);
    }
}
