<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $table = 'chamados';

    protected $fillable = [
        'tecnico_id',
        'cliente_id',
        'status_id',
        'descricao_problema',
        'descricao_solucao',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'tecnico_id');
    }

    public function usosEstoque()
    {
        return $this->hasMany(UsarEstoque::class);
    }
}
