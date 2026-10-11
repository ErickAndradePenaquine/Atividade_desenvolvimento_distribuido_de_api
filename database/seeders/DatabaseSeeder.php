<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nome' => 'admin',
            'cpf' => '00000000000',
            'email' => 'admin@email.com',
            'telefone' => '11999999999',
            'senha' => 'admin',
        ]);

        Status::query()->create(['nome' => 'Aberto']);
        Status::query()->create(['nome' => 'Em andamento']);
        Status::query()->create(['nome' => 'Concluído']);
    }
}
