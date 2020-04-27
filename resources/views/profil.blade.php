<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Trackmania</title>
    <style>
    h1 {
        text-align: center;
        margin-top: 10%;
    }

    .nav {
        padding-top: 10px;
    }

    .img {
        width: 300px;
        height: 300px;
    }

    .carte {
        height: 10%;
        width: 30%;
        margin-left: auto;
        margin-right: auto;
        border-radius: 50px;
        color: white;
        background-color: #141733;
    }

    .profile {
        padding-top: 50px;
    }

    .card-title {
        text-align: center;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 25px;
    }

    .card-img-top {
        border-radius: 50px 50px 0px 0px;
    }

    .navs {
        border: solid 1px #141733;
        border-radius: 20px 20px 20px 20px;
    }

    .nav {
        text-align: center;
    }

    .text-navs {
        height: 20rem;
    }
    </style>
</head>


<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">PS4</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">XBOX</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Nitendo</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Compte
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Connexion</a>
                            <a class="dropdown-item" href="#">Création d'un compte</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>


    <!--DEBUT PAGE-->

    <div class="container profile">

        <div class="row">


            <div class="card carte mb-3">
                <img src="assets/banniere.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><b>{{Auth::user()->firstname}}</b></h5>
                    <p class="card-text">
                        Informations :
                        <ul>
                            <li>Nom: {{Auth::user()->firstname}}</li>
                            <li>Prenom: {{Auth::user()->lastname}}</li>
                            <li>Email: {{Auth::user()->email}}</li>
                        </ul>
                    </p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-circle btn-lg float-right" data-toggle="modal"
                        data-target="#exampleModal"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--Debut body modal-->
                            <form method="post" action="{{route('admin-user.update', Auth::id()) }}">
                                @method('PATCH')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="firstname">First name</label>
                                        <input type="text" class="form-control" name="firstname"
                                            placeholder="{{Auth::user()->firstname}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="lastename">Last name</label>
                                        <input type="text" class="form-control" name="lastname"
                                            placeholder="{{Auth::user()->lastname}}">
                                    </div>
                                    <br>
                                    <div class="col-md-4 mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="{{Auth::user()->email}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password"
                                                aria-describedby="inputGroupPrepend3">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="navs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab"
                                aria-controls="description" aria-selected="false">Compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="avis-tab" data-toggle="tab" href="#avis" role="tab"
                                aria-controls="avis" aria-selected="false">Achat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="achat-tab" data-toggle="tab" href="#achat" role="tab"
                                aria-controls="achat" aria-selected="false">Liste d'envies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="envie-tab" data-toggle="tab" href="#envie" role="tab"
                                aria-controls="envie" aria-selected="false">Badge</a>
                        </li>
                    </ul>

                    <div class="tab-content text-navs">
                        <div class="tab-pane" id="description" role="tabpanel" aria-labelledby="description-tab">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque laudantium, esse numquam
                            optio soluta corrupti iste alias nobis architecto, pariatur nesciunt in voluptatem.
                            Similique saepe sequi quibusdam maxime id molestiae?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore distinctio nihil, similique
                            nobis et provident fuga molestiae! Corrupti dignissimos est magni accusamus, dolore, velit
                            voluptas necessitatibus, tempora magnam atque id.
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam deserunt similique
                            maiores, culpa cupiditate quos quae quaerat saepe aspernatur voluptatum officiis blanditiis
                            exercitationem impedit id quo dicta eligendi perspiciatis accusamus.
                        </div>

                        <!-------------------------------------JEUX ACHETE----------------------------------->
                        <div class="tab-pane" id="avis" role="tabpanel" aria-labelledby="avis-tab">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">id</th>
                                        <th scope="col">user_id</th>
                                        <th scope="col">game_activation_key</th>
                                    </tr>
                                </thead>
                                <tbody>
  
                                </tbody>
                            </table>
                        </div>


                        <!--ICI-->
                        <div class="tab-pane" id="achat" role="tabpanel" aria-labelledby="achat-tab">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">id</th>
                                        <th scope="col">user_id</th>
                                        <th scope="col">game_platforms_id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gameLikedByUsers as $gameLikedByUser)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$gameLikedByUser->id}}</td>
                                        <td>{{$gameLikedByUser->user_id}}</td>
                                        <td>{{$gameLikedByUser->game_platforms_id}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="envie" role="tabpanel" aria-labelledby="envie-tab">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, nulla? Tenetur odio
                            tempore, cupiditate consequuntur est laborum magnam minima quas exercitationem, ipsa unde
                            dignissimos necessitatibus, sed et quibusdam fugit id.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100"></div>
    </div>
    <script>
    $(function() {
        $('#myTab li:last-child a').tab('show')
    })
    </script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>