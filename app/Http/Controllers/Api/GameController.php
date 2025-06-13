<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {

        // prendo tutti i giochi dal db
        $query = Game::query()->with("platforms", "genres");

        // se è presente la ricerca, filtro i dati
        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where('title', 'like', '%' . $search . '%');
        }

        return response()->json(
            [
                "success" => true,
                "data" => $query->get()
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
