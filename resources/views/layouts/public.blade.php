<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/logo2.png') }}" class="img-logo" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Nos jeux</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Platformes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($platforms as $platform)
                            <a class="dropdown-item"
                                href="{{ route('platform', ['id' => $platform->id]) }}">{{ $platform->platform }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
                <div class="navbar">
                    <div class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @guest
                            <a class="dropdown-item" href="{{ route('login') }}">Connexion</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Inscription</a>
                            @endguest
                            @auth
                            <a class="dropdown-item" href="{{ url('/profile') }}">Mon profil</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endauth
                        </div>
                    </div>
                    <a href="#" id="cart"><i class="fa fa-shopping-cart"></i><span
                            class="badge badge-danger">{{ session('cart')->totalQuantity ?? 0 }}</span></a>
                    <div class="shopping-cart">
                        <div class="shopping-cart-header">
                            <i class="fa fa-shopping-cart cart-icon"></i><span
                                class="badge badge-danger">{{ session('cart')->totalQuantity ?? 0}}</span>
                            <div class="shopping-cart-total">
                                <span class="lighter-text">Total:</span>
                                <span class="main-color-text total">{{ session('cart')->totalPrice ?? 0}} €</span>
                            </div>
                        </div>

                        <ul class="shopping-cart-items">
                            @foreach(session('cart')->items ?? [] as $item)
                            <li class="clearfix">
                                <img src="{{ asset('storage/images/'.$item['item']->filename) }}" alt="item1" />
                                <span class="item-name">{{ $item['item']->title}}</span>
                                <span class="item-detail">{{ $item['item']->platform}}</span>
                                <span class="item-price">{{ $item['price']}} €</span>
                                <span class="item-quantity">Quantité: {{ $item['quantity']}}
                                </span>
                            </li>
                            @endforeach
                        </ul>

                        <a href="{{ url('/shopping-bar') }}" class="button">Checkout <i
                                class="fa fa-chevron-right"></i></a>
                    </div>
                </div>

                <form class="form-inline my-2 my-lg-0" method="POST" action="{{url('/search') }}">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>

    <main>
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('javascript')
</body>

</html>