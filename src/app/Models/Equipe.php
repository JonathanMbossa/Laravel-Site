<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = ['nom', 'ville'];

    public function joueurs()
    {
        return $this->hasMany(\App\Models\Joueur::class);
    }
}
