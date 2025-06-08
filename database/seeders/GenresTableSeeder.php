<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = ["Azione", "Avventura", "Strategico", "Gestionale", "Horror", "Mondo Aperto"];

        foreach ($genres as $genre) {
            $newGenre = new Genre();

            $newGenre->name = $genre;

            $newGenre->save();
        }
    }
}
