<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = "movimentacoes";

    protected $fillable = [
        'valor',
        'departamento_id',
        'funcionario_id',
        'descricao'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

}
