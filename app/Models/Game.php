<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // collego le piattaforme
    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }

    // collego i generi
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
