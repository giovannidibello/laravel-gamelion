<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    // collego i giochi
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
