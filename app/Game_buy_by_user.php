<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use DateInterval;
use Auth;


class Game_buy_by_user extends Model {
    public static function getAllGamesBougth() {
        $gamesBougth = [];
        $games = Game_buy_by_user::all();
        foreach($games as $game) {
            $allInformation = Game_activation_key::getActivationKeyAndGame($game->game_activation_key_id);
            // Attribution de la data à laquelle à été acheté le jeu
            $allInformation->created_at = $game->created_at;
            $gamesBougth[] = $allInformation;
        };
        return $gamesBougth;
    }

    public static function getTotalIncome() {
        $games = Game_buy_by_user::getAllGamesBougth();
        $totalIncome = 0;
        foreach($games as $game) {
            $totalIncome += $game->price;
        }
        return $totalIncome;
    }

    public static function getLastSevenDaysIncome() {
        $currentDate = new DateTime();
        $interval = new DateInterval('P7D');
        $lastSevenDays = $currentDate->sub($interval);
        $games = Game_buy_by_user::getAllGamesBougth();
        $totalIncome = 0;
        foreach($games as $game) {
            if ($game->created_at >= $lastSevenDays)
            $totalIncome += $game->price;
        }
        return $totalIncome;
    }

    public static function getLastSevenDaysGamesBougth() {
        $currentDate = new DateTime();
        $interval = new DateInterval('P7D');
        $lastSevenDays = $currentDate->sub($interval);
        $games = Game_buy_by_user::getAllGamesBougth();
        $totalGamesBougth = 0;
        foreach($games as $game) {
            if ($game->created_at >= $lastSevenDays)
            $totalGamesBougth += 1;
        }
        return $totalGamesBougth;
    }

    public static function getListGamesBougth($user_id) {
        $gamesBougth = [];
        foreach(Game_buy_by_user::where('user_id', $user_id)->get() as $game) {
            $gamesBougth[] = Game_activation_key::getActivationKeyAndGame($game->game_activation_key_id);
        };
        return $gamesBougth;
    }

    public static function isGameBougthByUser($game_id) {
        $gamesBougth = [];
        if (Auth::id()) {
            foreach(Game_buy_by_user::where('user_id', Auth::id())->get() as $game) {
                $game = Game_activation_key::getActivationKeyAndGame($game->game_activation_key_id);
                if ($game->id == $game_id) $gamesBougth[] = $game;     
            };
        }
        return $gamesBougth;
    }
}
