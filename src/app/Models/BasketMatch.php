<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasketMatch extends Model
{
    protected $fillable = ['date', 'equipe_domicile_id', 'equipe_exterieure_id', 'score_domicile', 'score_exterieur'];

    public function equipeDomicile()
    {
        return $this->belongsTo(Equipe::class, 'equipe_domicile_id');
    }
    public function equipeExterieure()
    {
        return $this->belongsTo(Equipe::class, 'equipe_exterieure_id');
    }

    public function statistiques()
    {
        return $this->hasMany(\App\Models\Statistique::class);
    }
}
