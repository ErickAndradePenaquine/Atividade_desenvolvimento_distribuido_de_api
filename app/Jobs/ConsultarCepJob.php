<?php

namespace App\Jobs;

use App\Models\Cliente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ConsultarCepJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $clienteId, public string $cep)
    {
    }

    public function handle(): void
    {
        $cep = preg_replace('/\D/', '', $this->cep);

        if ($cep === null || strlen($cep) !== 8) {
            return;
        }

        $response = Http::timeout(10)->get("https://viacep.com.br/ws/{$cep}/json/");

        if (! $response->successful() || $response->json('erro')) {
            return;
        }

        $cliente = Cliente::query()->find($this->clienteId);

        if ($cliente === null || preg_replace('/\D/', '', $cliente->cep) !== $cep) {
            return;
        }

        $cliente->update([
            'rua' => $response->json('logradouro'),
            'bairro' => $response->json('bairro'),
            'cidade' => $response->json('localidade'),
        ]);
    }
}
