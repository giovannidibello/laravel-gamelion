<?php

use App\Http\Controllers\Api\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("games", [GameController::class, "index"]);

Route::get("games/{game}", [GameController::class, "show"]);
