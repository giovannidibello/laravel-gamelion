<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // utilizzo il seeder per la tabella Games e Platforms
        $this->call([
            // GamesTableSeeder::class,
            // PlatformsTableSeeder::class,
            // GenresTableSeeder::class
        ]);
    }
}
