<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // proteggo il modello da assegnazioni di massa non volute
    protected $fillable = [
        'title',
        'cover_image',
        'description',
        'release_date',
        'developer',
        'publisher'
    ];

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
