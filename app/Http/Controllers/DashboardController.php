<?php

namespace App\Http\Controllers;

use App\User;
use App\Game_buy_by_user;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard.index')
        ->with('totalUsers', User::count())
        ->with('totalGamesBuy', Game_buy_by_user::count())
        ->with('lastSevenDaysGamesBuy', Game_buy_by_user::getLastSevenDaysGamesBougth())
        ->with('totalIncome', Game_buy_by_user::getTotalIncome())
        ->with('lastSevenDaysIncome', Game_buy_by_user::getLastSevenDaysIncome());
    }
}
