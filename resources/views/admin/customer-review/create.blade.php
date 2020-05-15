@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <br>
        <h1 class="display-4">Ajouter un avis</h1>
        <br>
        <div>
            <form method="post" action="{{ route('admin-customer-review.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Jeu (id) :</label>
                    <input type="number" class="form-control" name="game_platforms_id" />
                </div>

                <div class="form-group">
                    <label for="note">Note sur 5 :</label>
                    <input type="text" class="form-control" name="rating" />
                </div>

                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input type="text" class="form-control" name="title" />
                </div>
                <div class="form-group">
                    <label for="message">Description:</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter un avis</button>
            </form>
        </div>
    </div>
</div>
@endsection