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
</style>

<div class="noting">
    <div class="row">
        <div class="col-sm-6">
            <img class="image-principal" alt="image-principal" src="{{ asset('assets/fifa20-big.jpg') }}">
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
@endsection