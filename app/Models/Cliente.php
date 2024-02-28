<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{

    protected $fillable = [
        'cargo_id',
        'nome',
        'telefone',
        'email',
        'localizacao',
        'lido',
        'arquivado'
    ];

    protected $casts = [
        'lido' => 'boolean',
        'arquivado' => 'boolean',
    ];

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('arquivado', function (Builder $builder) {
            $builder->where('arquivado', 0);
        });
    }

}
