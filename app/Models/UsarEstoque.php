<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsarEstoque extends Model
{
    protected $table = 'usar_estoques';

    protected $fillable = ['estoque_id', 'chamado_id'];

    public function estoque()
    {
        return $this->belongsTo(Estoque::class);
    }

    public function chamado()
    {
        return $this->belongsTo(Chamado::class);
    }
}
