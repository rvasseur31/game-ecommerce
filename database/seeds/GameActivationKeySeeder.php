<?php

use App\Game_activation_key;
use Illuminate\Database\Seeder;

class GameActivationKeySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Game_activation_key::class, 4)->create()->each(function ($gameActivationKey) {
            $gameActivationKey->save();
        });
    }
}
