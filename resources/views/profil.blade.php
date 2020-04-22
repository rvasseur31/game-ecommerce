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
        /* .user-logo{
            width: 200px;
            height: 200px;
            margin-top: 20px;
        } */
        h1{
            text-align: center;
            margin-top: 10%;
        }

        .img{
            width:300px;
            height: 300px;
        }

        .card{
            height: 10%;
            width: 30%;
            margin-left: auto;
            margin-right: auto;
        }

        .container{
            padding-top: 50px;
        }

        .card-title{
            text-align: center;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 25px;
        }

        .ariane{
            padding-top: 10px;
            width: 25%;
        }

        .breadcrumb{
            text-align: center;
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

    <nav class="ariane" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Accueil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </nav>

    <div class="container">
        <div class="card mb-3">
            <img src="assets/banniere.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><b>{{Auth::user()->firstname}}</b></h5>
              <p class="card-text">
                  Informations ℹ️: 
                  <ul>
                      <li>Nom: {{Auth::user()->firstname}}</li>
                      <li>Prenom: {{Auth::user()->lastname}}</li>
                      <li>Email: {{Auth::user()->email}}</li>
                  </ul>
              </p>
               <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-circle btn-lg float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
            </div>
          </div>

  
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form id="changeInformations">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="firstanme">First name</label>
                            <input type="text" class="form-control" placeholder="{{Auth::user()->firstname}}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="lastename">Last name</label>
                            <input type="text" class="form-control" placeholder="{{Auth::user()->lastname}}">
                        </div>
                        <br>
                        <div class="col-md-4 mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" placeholder="{{Auth::user()->email}}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" aria-describedby="inputGroupPrepend3">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>