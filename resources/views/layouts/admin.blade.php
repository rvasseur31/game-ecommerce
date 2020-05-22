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
    <nav class="navbar fixed-top navbar-expand navbar-dark bg-primary"><a href="#menu-toggle" id="menu-toggle"
            class="navbar-brand"><span class="navbar-toggler-icon"></span></a><button class="navbar-toggler"
            type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02"
            aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
            </ul>
            <form class="form-inline my-2 my-md-0"></form>
        </div>
    </nav>
    <div id="wrapper" class="toggled">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#">Menu administrateur</a></li>
                <li class="sidebar-dropdown">
                    <a>
                        <i class="fas fa-home"></i>
                        <span class="menu-text">Accueil</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="#">Tous</a></li>
                            <li><a href="#">Ventes</a></li>
                            <li><a href="#">Revenus</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a>
                        <i class="fas fa-gamepad"></i>
                        <span class="menu-text">Jeu</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('admin-game.index') }}">Liste des jeux</a></li>
                            <li><a href="{{ route('admin-game.create') }}">Ajouter un jeu</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fab fa-xbox"></i>
                        <span class="menu-text">Plateforme de jeu</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('admin-platform.index') }}">Liste des plateformes</a></li>
                            <li><a href="{{ route('admin-platform.create') }}">Ajouter une platfeforme</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-comments"></i>
                        <span class="menu-text">Avis utilisateur</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('admin-customer-review.index') }}">Liste des avis</a></li>
                            <li><a href="{{ route('admin-customer-review.create') }}">Ajouter un avis</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('admin-user.index') }}">
                        <i class="fas fa-users"></i>
                        <span class="menu-text">Utilisateurs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-order.index') }}">
                        <i class="fas fa-shopping-basket"></i>
                        <span class="menu-text">Les commandes</span>
                    </a>
                </li>
            </ul>
        </div>
        <main id="page-content-wrapper" class="mt-5">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    $(function() {
        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if ($(this).parent().hasClass("active")) {
                $(".sidebar-dropdown").removeClass("active");
                $(this).parent().removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this).next(".sidebar-submenu").slideDown(200);
                $(this).parent().addClass("active");
            }

        });
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(window).resize(function(e) {
            if ($(window).width() <= 768) {
                $("#wrapper").removeClass("toggled");
            } else {
                $("#wrapper").addClass("toggled");
            }
        });
    });
    </script>
    @yield('scripts')
</body>

</html>