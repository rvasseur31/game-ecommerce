<?php

use App\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Game::class, 10)->create()->each(function ($game) {
            $game->save();
        });
    }
}
