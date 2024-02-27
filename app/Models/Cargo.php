<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{

    protected $fillable = [
        'nome_pt',
        'nome_en',
        'nome_es',
        'vagas'
    ];

    protected $casts = [
        'vagas' => 'integer',
    ];

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }

    public function curriculos(): HasMany
    {
        return $this->hasMany(Curriculo::class);
    }

}
