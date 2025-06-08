<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $games = Game::all();

        // inizializzo una variabile per la query
        $query = Game::query();

        // controllo se è usata la ricerca e la eseguo
        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('genres', function ($q2) use ($search) {
                        $q2->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('platforms', function ($q3) use ($search) {
                        $q3->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        $games = $query->get();

        return view("game.index", compact("games"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // prendo le piattaforme
        $platforms = Platform::all();

        // prendo i generi
        $genres = Genre::all();

        return view("game.create", compact("platforms", "genres"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newGame = new Game();

        $newGame->title = $data["title"];
        $newGame->release_date = $data["release_date"];
        $newGame->developer = $data["developer"];
        $newGame->publisher = $data["publisher"];
        $newGame->description = $data["description"];

        // controllo se l'utente ha richiesto l'upload dell'immagine
        if (array_key_exists("cover_image", $data)) {
            // carico l'immagine nel nostro storage
            $img_url = Storage::putFile("games", $data["cover_image"]);

            $newGame->cover_image = $img_url;
        }

        $newGame->save();

        // dopo aver salvato il progetto

        // verifico se sto ricevendo le piattaforme
        if ($request->has("platforms")) {

            // sincronizzo le platforms della tabella pivot
            $newGame->platforms()->sync($data["platforms"]);
        }

        // verifico se sto ricevendo i generi
        if ($request->has("genres")) {

            // sincronizzo i generi della tabella pivot
            $newGame->genres()->sync($data["genres"]);
        }

        return redirect()->route("game.show", $newGame);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {

        return view("game.show", compact("game"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        // prendo le piattaforme
        $platforms = Platform::all();

        // prendo i generi
        $genres = Genre::all();

        return view("game.edit", compact("game", "platforms", "genres"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $data = $request->all();

        // modifico le informazioni del gioco
        $game->title = $data["title"];
        $game->release_date = $data["release_date"];
        $game->developer = $data["developer"];
        $game->publisher = $data["publisher"];
        $game->description = $data["description"];

        if (array_key_exists("cover_image", $data)) {

            // elimino solo se esiste una vecchia immagine
            if ($game->cover_image && Storage::exists($game->cover_image)) {
                Storage::delete($game->cover_image);
            }

            // carico la nuova
            $img_url = Storage::putFile("games", $data["cover_image"]);

            // aggiorno il db
            $game->cover_image = $img_url;
        }

        $game->update();

        // verifico se sto ricevendo le piattaforme
        if ($request->has("platforms")) {

            // sincronizzo le platforms della tabella pivot
            $game->platforms()->sync($data["platforms"]);
        } else {
            // se non ricevo le piattaforme, allora elimino tutte quelle collegate a questo progetto
            $game->platforms()->detach();
        }

        // verifico se sto ricevendo i generi
        if ($request->has("genres")) {

            // sincronizzo i generi della tabella pivot
            $game->genres()->sync($data["genres"]);
        } else {
            // se non ricevo i generi, allora elimino tutti quelli collegati a questo progetto
            $game->genres()->detach();
        }

        return redirect()->route("game.show", $game);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // se il gioco ha l'immagine collegata la elimino
        if ($game->cover_image) {
            Storage::delete($game->cover_image);
        }

        $game->platforms()->detach();
        $game->genres()->detach();
        $game->delete();

        return redirect()->route("game.index");
    }
}
