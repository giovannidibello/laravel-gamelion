<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    // proteggo il modello da assegnazioni di massa non volute
    protected $fillable = [
        'name',
        'color'
    ];

    // collego i giochi
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
