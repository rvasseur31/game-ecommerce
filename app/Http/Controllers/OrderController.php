<?php

namespace App\Http\Controllers;

use App\Game_activation_key;
use App\Game_buy_by_user;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
        ->select('orders.*')
        ->addSelect('users.firstname')
        ->addSelect('users.lastname')
        ->get();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //dd(session('cart'));
        $inputs = $request->except('_token');
        $order = new Order();
        foreach ($inputs as $key => $value) {
            $order->$key = $value;
        }
        $order->save();

        foreach(session('cart')->items ?? [] as $item) {
            $activationKey = Game_activation_key::where('game_platforms_id', $item['item']->id)->where('used', false)->first();
            $activationKey->used = true;
            $activationKey->save();

            $newGameBuy = new Game_buy_by_user();
            $newGameBuy->user_id = $inputs['user_id'];
            $newGameBuy->game_activation_key_id = $activationKey->id;
            $newGameBuy->order_id = $order->id;
            $newGameBuy->save();
        }

        $user = User::find($inputs['user_id']);
        $user->balance = session('cart')->totalPrice;
        $user->save();

        session(['cart' => null]);

        return redirect(route('index'))->with('success', 'Jeu enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $order
     * @return \Illuminate\Http\Response
     */
    public function show($order) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($order) {
        return view('order.edit', ['order' => Order::find($order)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order) {
        $inputs = $request->except('_token', '_method');
        $order = Order::find($order);
        foreach ($inputs as $key => $value) {
            $order->$key = $value;
        }
        $order->save();

        return redirect(route('order.index'))->with('success', 'Jeu mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($order) {
        $order = Order::find($order);
        $order->delete();

        return redirect(route('order.index'))->with('success', 'order supprimé avec succès !');
    }
}
