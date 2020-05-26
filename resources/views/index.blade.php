@extends('layouts.public')

@section('content')
<div class="col-sm-12">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>

<h2 class="index-title">Nos jeux les plus vues</h2>
<div class="items">
    @foreach($mostViewedGames as $game)
    <div class="card">
        <img src="{{ asset('storage/thumbs/'.$game->filename) }}" class="img-responsive card-img-top"
            alt="product image">
        <div class="card-body">
            <h5 class="card-title">{{ $game->title }}</h5>
            <p class="card-text truncate-after-3-line">{{ $game->description }}</p>
            <a href="{{ url('/product/'.$game->id) }}" class="btn btn-primary">Détails</a>
        </div>
    </div>
    @endforeach
</div>

<h2 class="index-title">Tous nos jeux</h2>
<div class="items">
    @foreach($games as $game)
    <div class="card">
        <img src="{{ asset('storage/thumbs/'.$game->filename) }}" class="img-responsive card-img-top"
            alt="product image">
        <div class="card-body">
            <h5 class="card-title">{{ $game->title }}</h5>
            <p class="card-text truncate-after-3-line">{{ $game->description }}</p>
            <a href="{{ url('/product/'.$game->id) }}" class="btn btn-primary">Détails</a>
        </div>
    </div>
    @endforeach
</div>
@endsection