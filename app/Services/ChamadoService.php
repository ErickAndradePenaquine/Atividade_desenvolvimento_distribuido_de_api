<?php

namespace App\Services;

use App\Models\Chamado;
use App\Repositories\ChamadoRepository;
use Illuminate\Database\Eloquent\Collection;

class ChamadoService
{
    public function __construct(private ChamadoRepository $chamadoRepository) {}
    public function get(): Collection
    {
        return $this->chamadoRepository->get();
    }
    public function store(array $data): Chamado
    {
        return $this->chamadoRepository->store($data)->load(['cliente', 'status', 'tecnico']);
    }
    public function details(int $id): Chamado
    {
        return $this->chamadoRepository->details($id);
    }
    public function update(int $id, array $data): Chamado
    {
        return $this->chamadoRepository->update($id, $data);
    }
    public function destroy(int $id): Chamado
    {
        return $this->chamadoRepository->destroy($id);
    }
}
