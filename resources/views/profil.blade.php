@extends('layouts.public')

@section('css')
<link href="{{ asset('css/floating-labels-edit-text.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container pt-4">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                <h6>Changer de photo de profil</h6>
                <input type="file" class="text-center center-block file-upload">
            </div>
        </div>
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile">Mon profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#orders">Mes achats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#games">Mes Jeux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#liked-games">Mes coup de coeurs</a>
                </li>
            </ul>
            <div class="tab-content container pt-2">
                <div class="tab-pane container active" id="profile">
                    <form class="form" action="{{ route('profile.update', Auth::id()) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-label-group">
                            <input type="text" id="input-firstname" name="firstname"
                                class="form-control @error('firstname') is-invalid @enderror" placeholder="Prénom"
                                value="{{Auth::user()->firstname}}" required>
                            <label for="inputPassword">Prénom</label>
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="input-lastname" name="lastname"
                                class="form-control @error('lastname') is-invalid @enderror"
                                placeholder="Nom de famille" value="{{Auth::user()->lastname}}" required>
                            <label for="inputPassword">Nom de famille</label>
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="input-email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Adresse e-mail"
                                value="{{Auth::user()->email}}" required>
                            <label for="inputPassword">Adresse e-mail</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="input-password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe">
                            <label for="inputPassword">Mot de passe</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="input-password-confirm" name="password-confirm"
                                class="form-control @error('password-confirm') is-invalid @enderror"
                                placeholder="Confirmer votre mot de passe">
                            <label for="inputPassword-confirm">Confirmer votre mot de passe</label>
                            @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group">
                            <input type="date" id="input-born_date" name="born_date"
                                class="form-control @error('born_date') is-invalid @enderror"
                                placeholder="Date de naissance" value="{{Auth::user()->born_date}}">
                            <label for="inputborn_date">Date de naissance</label>
                            @error('born_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group">
                            <input type="number" id="input-balance" name="balance"
                                class="form-control @error('balance') is-invalid @enderror"
                                placeholder="Date de naissance" value="{{Auth::user()->balance}}">
                            <label for="inputbalance">Date de naissance</label>
                            @error('balance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i
                                        class="glyphicon glyphicon-ok-sign"></i>Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>
                                    Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane container fade" id="orders">
                    <ul class="list-group">
                        <li class="list-group-item active">Mes commandes : </li>
                        @foreach($orders as $order)
                        <a href="{{ url('/invoice/'.Auth::id().'/'.$order->id) }}"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Commande passée le {{ $order->created_at }}</h5>
                                <small>Voir en détail</small>
                            </div>
                            <p class="mb-1">Adresse de livraison : {{ $order->address }}, {{ $order->sub_address }},
                                {{ $order->country }}, {{ $order->state }}</p>
                        </a>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane container fade" id="games">
                    <ul class="list-group">
                        <li class="list-group-item active">Mes jeux : </li>
                        @foreach($gamesBought as $game)
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $game->title }}</h5>
                            </div>
                            <p class="mb-1">{{ $game->description }}</p>
                            <p class="mb-1">{{ $game->activation_key }}</p>
                        </a>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane container fade" id="liked-games">
                    <ul class="list-group">
                        <li class="list-group-item active">Mes coup de coeurs : </li>
                        @foreach($gamesLiked as $game)
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $game->title }}</h5>
                            </div>
                            <p class="mb-1">{{ $game->description }}</p>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function() {
        readURL(this);
    });
});
</script>
@endsection