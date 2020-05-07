<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminDashboardController extends Controller
{
    public function index() {
        return view('dashboard.index')
        ->with('users', User::count());
    }
}
