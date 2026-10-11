<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'cep',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'referencia',
    ];

    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }
}
