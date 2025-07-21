<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    protected $fillable = ['nom', 'prenom', 'poste', 'numero', 'equipe_id'];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function statistiques()
    {
        return $this->hasMany(\App\Models\Statistique::class);
    }
}
