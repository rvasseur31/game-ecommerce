<?php

use App\GamePlatform;
use Illuminate\Database\Seeder;

class GamePlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(GamePlatform::class, 100)->create()->each(function ($game) {
            $game->save();
        });
    }
}
