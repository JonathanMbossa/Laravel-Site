<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entraineur extends Model
{
    protected $fillable = ['nom', 'equipe_id'];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
