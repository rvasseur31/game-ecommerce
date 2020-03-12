<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(User::class, 4)->create()->each(function ($user) {
            $user->save();
        });
    }
}