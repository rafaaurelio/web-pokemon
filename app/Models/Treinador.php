<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Treinador extends Model
{
    protected $fillable = [
        'nome',
        'imagem',
    ];

    public function pokemon(): HasMany{
        return $this->hasMany(Pokemon::class);

    }
}
