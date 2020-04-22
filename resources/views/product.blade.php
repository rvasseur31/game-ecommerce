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

.product-detailed-information {
    font-size: 1rem;
    line-height: 1.5;
}

.product-detailed-information #collapse-product-detailed-information.collapse:not(.show) {
    display: block;
    height: 3rem;
    overflow: hidden;
}

.product-detailed-information #collapse-product-detailed-information.collapsing {
    height: 3rem;
}

.product-detailed-information a.collapsed:after {
    content: '+ Show More';
}

.product-detailed-information a:not(.collapsed):after {
    content: '- Show Less';
}

.list-group-item {
    background-color: unset;
}
</style>

<div class="product-content pt-5">
    <div class="row">
        <div class="product-images col-sm-6 row d-flex justify-content-center">
            <div class="small-product-image-carousel col-sm-2">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('storage/thumbs/'.$game->filename) }}">
            </div>
            <div class="big-product-image col-sm-8">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
            </div>
        </div>
        <div class="col-sm-6 product-information">
            <h1 class="product-title">{{ $game->title }}</h1>
            <p class="product-price">{{ $game->price }} €</p>
            <div class="d-flex flex-wrap pb-3">
            @foreach($otherPlatforms as $platform)
                <a href="{{ url('/product/'.$platform->id) }}"
                    class="btn btn-outline-primary mr-4">{{ $platform->platform }}</a>
            @endforeach
            </div>

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
        <p class="collapse" id="collapse-product-detailed-information" aria-expanded="false">
            {{ $game->description }} {{ $game->description }} {{ $game->description }} {{ $game->description }}
            {{ $game->description }} {{ $game->description }}
        </p>
        <a role="button" class="collapsed" data-toggle="collapse" href="#collapse-product-detailed-information"
            aria-expanded="false" aria-controls="collapse-product-detailed-information">
        </a>
        <ul class="list-group list-group-flush pt-3">
            <li class="list-group-item">Date de sortie : {{ $game->release_date }}</li>
            <li class="list-group-item">Plateforme : {{ $game->platform }}</li>
        </ul>
    </div>
    <div class="product-medias pt-5">
        <h2>Médias</h2>
        <div class="product-images col-sm-6 row d-flex justify-content-center">
            <div class="small-product-image-carousel col-sm-2">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image" src="{{ asset('storage/thumbs/'.$game->filename) }}">
            </div>
            <div class="big-product-image col-sm-8">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
            </div>
        </div>
    </div>
    @if(sizeof($customerReviews))
    <div class="product-customer-reviews pt-5 pb-5">
        <h2>Avis</h2>
        <div class="bv-inline-histogram-ratings">
            @for ($index = sizeof($customerReviewByMark)-1; $index >= 0; $index--)
            <div class="d-flex justify-content-start">
                <p>{{ $index+1 }}</p>
                <div class="star-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class=" d-block w-25 mt-1 pl-3">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ sizeof($customerReviewByMark[$index]) / sizeof($customerReviews) * 100 }}%"
                            aria-valuenow="{{ sizeof($customerReviewByMark[$index]) / sizeof($customerReviews) * 100 }}"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <p class="pl-3 customer-review-counter-by-mark">{{ sizeof($customerReviewByMark[$index]) }}</p>
            </div>
            @endfor
        </div>
        @foreach($customerReviews as $customerReview)
        <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex justify-content-start">
                    <div class="customer-review-mark d-flex justify-content-start pt-1">
                        @for ($index = 0; $index < $customerReview->rating; $index++)
                            <span class="fa fa-star text-primary"></span>
                            @endfor
                            @for ($index = 0; $index < 5 - $customerReview->rating; $index++)
                                <span class="fa fa-star"></span>
                                @endfor
                    </div>
                    <div class="ml-3 customer-review-user-firstname">
                        {{$customerReview->firstname}}
                    </div>
                    <div class="ml-3 customer-review-posted-at">
                        {{$customerReview->created_at}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4>{{ $customerReview->title }}</h4>
                <p>{{ $customerReview->description }}</p>
            </div>

        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection