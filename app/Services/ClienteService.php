<?php

namespace App\Services;

use App\Jobs\ConsultarCepJob;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use Illuminate\Database\Eloquent\Collection;

class ClienteService
{
    public function __construct(private ClienteRepository $clienteRepository) {}

    public function get(): Collection
    {
        return $this->clienteRepository->get();
    }

    public function store(array $data): Cliente
    {
        $cliente = $this->clienteRepository->store($data);
        ConsultarCepJob::dispatch($cliente->id, $cliente->cep);
        return $cliente;
    }

    public function details(int $id): Cliente
    {
        return $this->clienteRepository->details($id);
    }

    public function update(int $id, array $data): Cliente
    {
        $cliente = $this->clienteRepository->update($id, $data);
        if (isset($data['cep'])) {
            ConsultarCepJob::dispatch($cliente->id, $cliente->cep);
        }
        return $cliente;
    }

    public function destroy(int $id): Cliente
    {
        return $this->clienteRepository->destroy($id);
    }
}
