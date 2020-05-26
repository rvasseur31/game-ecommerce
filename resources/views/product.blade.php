@extends('layouts.public')

@section('content')
<div class="product-content pt-5">
    <div class="row">
        <div class="product-images col-sm-6 row d-flex justify-content-center">
            <div class="small-product-image-carousel col-sm-2">
                <img class="small-product-image" alt="small-product-image"
                    src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image"
                    src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image"
                    src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image"
                    src="{{ asset('storage/thumbs/'.$game->filename) }}">
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

            <form action="{{ route('addToCart', ['id' => $game->id]) }}" method="post">
                @csrf
                @if($isAvailable)
                <button type="submit" class="btn btn-primary product-add-to-cart">Ajouter au panier</button>
                @else
                <button class="btn btn-primary product-add-to-cart" disabled>Indisponible</button>
                @endif
            </form>

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
                    <a class="nav-link text-uppercase" href="#detailed-information-title">Informations détaillées</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#media-title">Médias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#customer-review-title">Avis</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="product-detailed-information pt-5">
        <h2 id="detailed-information-title">Informations détaillées</h2>
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
        <h2 id="media-title">Médias</h2>
        <div class="product-images col-sm-6 row d-flex justify-content-center">
            <div class="small-product-image-carousel col-sm-2">
                <img class="small-product-image" alt="small-product-image"
                    src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image"
                    src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image"
                    src="{{ asset('storage/thumbs/'.$game->filename) }}">
                <img class="small-product-image" alt="small-product-image"
                    src="{{ asset('storage/thumbs/'.$game->filename) }}">
            </div>
            <div class="big-product-image col-sm-8">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
                <img class="image-principal" alt="image-principal" src="{{ asset('storage/images/'.$game->filename) }}">
            </div>
        </div>
    </div>
    <div class="product-customer-reviews pt-5 pb-5">
        <h2 id="customer-review-title">Avis</h2>
        @if(sizeof($customerReviews))
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
        @foreach($customerReviews as $key => $customerReview)
        <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
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
                    @if (Auth::id() == $customerReview->user_id)
                    <button type="button" class="btn btn-link edit-customer-review" data-toggle="modal"
                        data-target="#modal-edit-customer-review" data-id="{{ $key }}"
                        data-customer-review-id="{{ $customerReview->id }}"><i class="fas fa-edit"></i></button>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <h4 class="customer-review-title-{{$key}}">{{ $customerReview->title }}</h4>
                <p class="customer-review-description-{{$key}}">{{ $customerReview->description }}</p>
                <input type="hidden" class="customer-review-rating-{{$key}}" value="{{ $customerReview->rating }}">
            </div>

        </div>
        @endforeach
        @else

        <div class="bv-inline-histogram-ratings">
            @for ($index = sizeof($customerReviewByMark)-1; $index >= 0; $index--)
            <div class="d-flex justify-content-start">
                <p>{{ $index+1 }}</p>
                <div class="star-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="d-block w-25 mt-1 pl-3">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <p class="pl-3 customer-review-counter-by-mark">{{ sizeof($customerReviewByMark[$index]) }}</p>
            </div>
            @endfor
        </div>
        @endif
        @if ($isGameBuyByUser)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-customer-review">
            Ajouter un avis
        </button>
        @elseif (!Auth::id())
        <p>Vous devez vous connecter pour déposer un avis</p>
        @else
        <p>Vous devez achetez le jeu pour déposer votre avis</p>
        @endif
        <div class="modal fade" id="modal-customer-review" tabindex="-1" role="dialog"
            aria-labelledby="modal-customer-review-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-customer-review-label">Ajouter un avis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('admin-customer-review.store') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="game_platforms_id" value="{{ $game->id}}">
                            <div class="form-group">
                                <label for="note">Note sur 5 :</label>
                                <input type="number" min="1" max="5" class="form-control" name="rating" />
                            </div>

                            <div class="form-group">
                                <label for="titre">Titre:</label>
                                <input type="text" class="form-control" name="title" />
                            </div>
                            <div class="form-group">
                                <label for="message">Description:</label>
                                <textarea type="text" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter un avis</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-edit-customer-review" tabindex="-1" role="dialog"
            aria-labelledby="modal-edit-customer-review-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-edit-customer-review-label">Modifier mon avis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="edit-form-customer-review" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="game_platforms_id" value="{{ $game->id}}">
                            <div class="form-group">
                                <label for="note">Note sur 5 :</label>
                                <input type="number" min="1" max="5" class="form-control edit-rating" name="rating" />
                            </div>

                            <div class="form-group">
                                <label for="titre">Titre:</label>
                                <input type="text" class="form-control edit-title" name="title" />
                            </div>
                            <div class="form-group">
                                <label for="message">Description:</label>
                                <textarea type="text" class="form-control edit-description"
                                    name="description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Modifier mon avis</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
    $('#modal-edit-customer-review').on('show.bs.modal', function(event) {
        var modal = $(this);
        var id = $(event.relatedTarget).data('id');
        var customerReviewId = $(event.relatedTarget).data('customer-review-id');
        modal.find('.edit-rating').val($('.customer-review-rating-' + id).val());
        modal.find('.edit-title').val($('.customer-review-title-' + id).text());
        modal.find('.edit-description').val($('.customer-review-description-' + id).text());
        modal.find('.edit-form-customer-review').attr('action', '/admin/customer-review/' +
            customerReviewId);
    });
});
</script>
@endsection