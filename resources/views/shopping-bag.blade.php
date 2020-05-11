@extends('layouts.public')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Mon panier</span>
                <span class="badge badge-secondary badge-pill">{{ session('cart')->totalQuantity ?? 0 }}</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach(session('cart')->items ?? [] as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $item['item']->title}}</h6>
                        <small class="text-muted">{{ $item['item']->platform}}</small>
                    </div>
                    <div>
                        <h6 class="my-0">{{ $item['price']}} €</h6>
                        <small class="text-muted">x{{ $item['quantity']}}</small>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form action="{{ route('removeToCart', ['id' => $item['item']->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn btn-link product-add-to-cart"><i
                                    class="fas fa-minus"></i></button>
                        </form>
                        <form action="{{ route('addToCart', ['id' => $item['item']->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn btn-link product-add-to-cart ml-1"><i
                                    class="fas fa-plus"></i></button>
                        </form>
                    </div>
                </li>
                @endforeach
                <!-- <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-$5</span>
                </li> -->
                @if($errors->any())
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-danger">
                        <h6 class="my-0">{{$errors->first()}}</h6>
                    </div>
                </li>
                @endif
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (€) :</span>
                    <strong>{{ session('cart')->totalPrice ?? 0}} €</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ajouter un code promo">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">
                Adresse de facturation</h4>
            <form class="needs-validation" method="POST" action="{{ route('order.store') }}">
                @csrf
                <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                <div class="mb-3">
                    <label for="address">Adresse :</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required=""
                        name="address" value="{{ old('address') }}">
                    <div class="invalid-feedback">
                        Une adresse valide est requise.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">Complément d'adresse :<span class="text-muted">(Optionel)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite"
                        name="sub_address" value="{{ old('sub_address') }}">
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Pays</label>
                        <select class="custom-select d-block w-100" id="country" name="country" required="">
                            <option value="">Choisir...</option>
                            <option {{ old("country") == 'France' ? "selected":"" }}>France</option>
                        </select>
                        <div class="invalid-feedback">
                            Entrer un pays valide.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Région</label>
                        <select class="custom-select d-block w-100" id="state" name="state" required="">
                            <option value="">Choisir...</option>
                            <option {{ old("country") == 'Occitanie' ? "selected":"" }}>Occitanie</option>
                        </select>
                        <div class="invalid-feedback">
                            Entrer une région valide.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Code postal</label>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="" required="" value="{{ old('zip') }}">
                        <div class="invalid-feedback">
                            Un code postal valide est requis
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">
                        L'adresse de livraison est la même que mon adresse de facturation</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Sauvegarder les informations pour les prochaines
                        commandes</label>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Acheter</button>
            </form>
        </div>
    </div>
</div>
@endsection