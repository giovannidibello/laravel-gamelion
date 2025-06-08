<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 20; $i++) {

            $newGame = new Game();

            $newGame->title = $faker->unique()->words(3, true);
            $newGame->description = $faker->paragraphs(3, true);
            $newGame->release_date = $faker->date();
            $newGame->developer = $faker->company();
            $newGame->publisher = $faker->company();


            $newGame->save();
        }
    }
}
