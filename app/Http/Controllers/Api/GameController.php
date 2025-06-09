<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {

        // prendo tutti i giochi dal db
        $games = Game::with("type")->get();


        return response()->json(
            [
                "success" => true,
                "data" => $games
            ]
        );
    }

    public function show(Game $game)
    {

        $game->load("platforms", "genres");

        return response()->json(
            [
                "success" => true,
                "data" => $game
            ]
        );
    }
}
