@extends('layouts.admin')

@section('content')
<style>
html,
body {
    max-width: 100vw;
    overflow-x: hidden;
}
</style>

<div class="col-sm-12">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
<div class="container">
    <div class="paginate row">
        @foreach($games as $game)
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card">
                <img src="{{ asset('storage/thumbs/'.$game->filename) }}" class="img-responsive card-img-top"
                    alt="product image">
                <div class="card-body">
                    <h5 class="card-title">{{ $game->title }}</h5>
                    <p class="card-text truncate-after-3-line">{{ $game->description }}</p>
                    <a href="{{ url('/product/'.$game->id) }}" class="btn btn-primary">Détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="paginate-button text-center d-flex justify-content-center mt-5">
        {{ $games->links() }}
    </div>
</div>
@endsection