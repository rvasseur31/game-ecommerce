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
    <style>
    body {
        overflow-x: hidden;
    }

    #wrapper {
        padding-left: 0;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #wrapper.toggled {
        padding-left: 250px;
    }

    #sidebar-wrapper {
        z-index: 1000;
        position: fixed;
        left: 250px;
        width: 0;
        height: 100%;
        margin-left: -250px;
        overflow-y: auto;
        background: #000;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 250px;
    }

    #page-content-wrapper {
        width: 100%;
        position: absolute;
        padding: 15px;
    }

    #wrapper.toggled #page-content-wrapper {
        position: absolute;
        margin-left: 0px;
    }


    /* Sidebar Styles */

    .sidebar-nav {
        position: absolute;
        top: 0;
        width: 250px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .sidebar-nav li {
        text-indent: 20px;
        line-height: 40px;
    }

    .sidebar-nav li a {
        display: block;
        text-decoration: none;
        color: #999999;
    }

    .sidebar-nav li a:hover {
        text-decoration: none;
        color: #fff;
        background: rgba(255, 255, 255, 0.2);
    }

    .sidebar-nav li a:active,
    .sidebar-nav li a:focus {
        text-decoration: none;
    }

    .sidebar-nav>.sidebar-brand {
        height: 65px;
        font-size: 18px;
        line-height: 60px;
    }

    .sidebar-nav>.sidebar-brand a {
        color: #999999;
    }

    .sidebar-nav>.sidebar-brand a:hover {
        color: #fff;
        background: none;
    }

    @media(min-width:768px) {
        #wrapper {
            padding-left: 0;
        }

        #wrapper.toggled {
            padding-left: 250px;
        }

        #sidebar-wrapper {
            width: 0;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 250px;
        }

        #page-content-wrapper {
            padding: 20px;
            position: relative;
        }

        #wrapper.toggled #page-content-wrapper {
            position: relative;
            margin-left: 0;
        }
    }


    ul li a {
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        text-decoration: none;
        position: relative;
        width: 100%;
    }

    ul li a i {
        display: unset !important;
        margin-right: 10px;
    }

    ul li a .menu-text {
        flex-grow: 1;
        white-space: nowrap;
        text-overflow: ellipsis;
        flex-shrink: 1;
        overflow: hidden;
    }

    .sidebar-dropdown>a:after {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f105";
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        background: 0 0;
        position: absolute;
        right: 45px;
        top: 1px;
        transition: transform 0.3s ease;
    }

    .sidebar-dropdown .sidebar-submenu {
        display: none;
    }

    .sidebar-dropdown .sidebar-submenu ul {
        padding: 5px 0;
    }

    .sidebar-dropdown .sidebar-submenu li {
        font-size: 13px;
        list-style-type: none;
    }

    .sidebar-dropdown .sidebar-submenu li a {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        padding-left: 30px;
    }

    .sidebar-dropdown.active>a:after {
        transform: rotate(90deg);
        top: -8px;
    }
    </style>
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
            </ul>
        </div>
        <main id="page-content-wrapper">
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