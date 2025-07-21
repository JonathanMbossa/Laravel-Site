<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistique extends Model
{
    protected $fillable = ['joueur_id', 'basket_match_id', 'points', 'rebonds', 'passes'];

    public function joueur()
    {
        return $this->belongsTo(Joueur::class);
    }
    public function basketMatch()
    {
        return $this->belongsTo(BasketMatch::class);
    }
}
