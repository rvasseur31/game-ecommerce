<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game_buy_by_user;
use App\GamePlatform;
use DateTime;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index() {
        return view('dashboard.index')
        ->with('usersTotal', User::count())
        ->with('gamesbuyTotal', Game_buy_by_user::count())
        ->with('revenueTotal', GamePlatform::count('price')->value('price'));
    }

    //Fonction 7 JOURS AVANT
    // public function getAllGameBuy() {
    //     $inputs = request()->all();
    //     $endDate = new DateTime();
    //     return EventItem::all()->whereBetween('created_at', [$inputs["date"], $endDate]);
    // }

    
    //AJOUTER
    // 'created_at'=>new DateTime(),
    // 'updated_at'=>new DateTime()
}
