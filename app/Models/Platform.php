<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    // collego i giochi
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
