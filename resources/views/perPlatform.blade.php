@extends('layouts.public')

@section('css')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('content')
<style>
body {
    max-width: 100vw;
    overflow: hidden;
}
</style>

<div class="container">
    <div class="paginate row">
        @foreach($games as $key => $game)
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3" data-aos="fade-up" data-aos-delay="{{ $key * 50 }}">
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

@section('javascript')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({
    once: true,
});
</script>
@endsection