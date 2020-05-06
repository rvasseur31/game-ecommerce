<?php

namespace App\Http\Controllers;

use App\GamePlatform;
use App\Platform;
use App\Cart;
use App\Game_activation_key;
use App\Game_buy_by_user;
use App\Order;
use App\Repositories\User\UserInterface;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;


class PublicController extends Controller {
    protected $userRepository;

    public function __construct(UserInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function popular() {
        return 0;
    }

    public function index() {
        return view('index')
            ->with('platforms', Platform::all())
            ->with('games', GamePlatform::allGames()->get());
    }

    /**
     * Show games from specific platform.
     * 
     * @param interger $platform_id : id from table platform
     * @return Response : list of game
     */
    public function gamePerPlatform(int $platform_id) {
        return view('perPlatform')
            ->with('platforms', Platform::all())
            ->with('games', GamePlatform::allGames()->where('platform_id', $platform_id)->paginate(12));
    }

    public function product(int $game_id) {
        return view('product')
            ->with('liked', $this->userRepository->isFavorite($game_id))
            ->with('platforms', Platform::all())
            ->with('otherPlatforms', GamePlatform::getOtherPlatformFromGame($game_id))
            ->with('customerReviews', GamePlatform::find($game_id)->hasManyCustomerReview())
            ->with('customerReviewByMark', $this->getCustomerReviewByMark($game_id))
            ->with('game', GamePlatform::game($game_id));
    }

    public function addToCart($game_id) {
        $game = GamePlatform::game($game_id);
        $oldCart = session('cart', null);
        $cart = new Cart($oldCart);
        $cart->add($game, $game_id);

        session(['cart' => $cart]);
        
        //dd(session('cart', null));
        return redirect(route('index'));
    }

    public function shoppingBag() {
        return view('shopping-bag')
            ->with('platforms', Platform::all());
    }

    public function userInvoice($user_id, $order_id) {
        $order = Order::find($order_id);
        $user = User::find($user_id);
        $games = Game_buy_by_user::where('order_id', $order_id)->get();
        $activationKeys = [];
        $totalPrice = 0;
        foreach($games as $game) {
            $game = Game_activation_key::getActivationKeyAndGame($game->game_activation_key_id);
            $activationKeys[] = $game;
            $totalPrice += $game->price;
        }
        //dd(compact('order', 'user', 'games', 'activationKeys', 'totalPrice')); 
        $pdf = PDF::loadView('pdf.invoice', compact('order', 'user', 'games', 'activationKeys', 'totalPrice'));
        return $pdf->download('invoice.pdf');
    }


    function getCustomerReviewByMark($game_id) {
        $customerReviewByMark = [];
        for($index = 1; $index <= 5; $index++) {
            $customerReviewByMark[] = GamePlatform::find($game_id)->hasManyCustomerReview()
                ->where('rating', $index);
        }
        return $customerReviewByMark;
    }
}