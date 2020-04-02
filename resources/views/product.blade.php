@extends('layouts.public')

@section('content')
<style>
.image-principal {
    max-width: 100%;
}

.product-information {
    padding-left: 40px;
    flex-direction: column;
}

.product-title {
    padding: 40px 40px 40px 0;
}

.product-price {
    font-size: 3rem;
}

.product-add-to-cart {
    font-size: 1.5rem;
    padding: 10px 30px;
}

.small-product-image-carousel .small-product-image {
    width: 100px;
}

.small-product-image-carousel .slick-slide {
    margin: 18.75px 0;
}

.small-product-image-carousel .slick-list {
    margin: -18.75px 0;
}

.product-images {
    padding-left: 20px;
}

/** Sub content */
.sub-content {
    margin-top: 40px;
}

.rounded-nav {
    border-radius: 5px;
}
</style>

<div class="product-content">
    <div class="row">
        <div class="product-images col-sm-6 row d-flex justify-content-center">
            <div class="small-product-image-carousel col-sm-2">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('assets/fifa20-big.jpg') }}">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('assets/fifa20-big.jpg') }}">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('assets/fifa20-big.jpg') }}">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('assets/fifa20-big.jpg') }}">
            </div>
            <div class="big-product-image col-sm-8">
                <img class="image-principal" alt="image-principal" src="{{ asset('assets/fifa20-big.jpg') }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('assets/fifa20-big.jpg') }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('assets/fifa20-big.jpg') }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('assets/fifa20-big.jpg') }}">
            </div>
        </div>
        <div class="col-sm-6 product-information">
            <h1 class="product-title">{{ $game->title }}</h1>
            <p class="product-price">{{ $game->price }} €</p>

            <a type="button" class="btn btn-primary product-add-to-cart">Ajouter au panier</a>
            <form action="{{ route('favorite') }}" method="post">
                @csrf
                <input type="hidden" name="product" value="{{ $game->id }}">
                <div class="like-button">
                    @if($liked)
                    <input type="hidden" name="favorite" value="">
                    <button type="submit" class="btn bg-transparent"><i class="fas fa-heart"></i> Retirer de la liste de
                        souhait</button>
                    @else
                    <input type="hidden" name="favorite" value="true">
                    <button type="submit" class="btn bg-transparent"><i class="far fa-heart"></i> Ajouter à la liste de
                        souhait</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<div class="sub-content container">
    <nav class="navbar navbar-expand navbar-dark bg-primary rounded-nav">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#">Informations détaillées</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#">Médias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#">Avis</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="product-detailed-information pt-5">
        <h2>Informations détaillées</h2>
        <p>
            {{ $game->description }}
        </p>
    </div>
    <div class="product-medias pt-5">
        <h2>Médias</h2>
    </div>
    <div class="product-customer-reviews pt-5">
        <h2>Avis</h2>
    </div>
</div>
@endsection