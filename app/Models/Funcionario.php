<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'name'
    ];

    public function departamentos()
    {
    	return $this->belongsToMany(Departamento::class);
    }
}
