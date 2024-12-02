<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Pokemon extends Model
{
        protected $fillable = [
        'nome',
        'tipo',
        'pontos_de_poder',
        'imagem',
        'treinador_id',

    ];

    public function treinador(): BelongsTo
    {
        return $this->belongsTo(Treinador::class);
    }

}
