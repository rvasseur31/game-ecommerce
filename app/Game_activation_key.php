<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_activation_key extends Model
{
    public function UserGame() {
        return $this->belongsTo('App\User');
    }
}
