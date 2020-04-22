@extends('layouts.admin')

@section('content')
<div>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Mettre à jour l'avis</h1>
            <form method="post" action="{{ route('admin-customer-review.update', $customerReview->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="note">Note sur 5 :</label>
                    <input type="text" class="form-control" name="rating" value="{{ $customerReview->rating }}" />
                </div>

                <div class="form-group">
                    <label for="titre">Titre :</label>
                    <input type="text" class="form-control" name="title" value="{{ $customerReview->title }}" />
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <input type="text" class="form-control" name="description" value="{{ $customerReview->description }}" />
                </div>
                <button type="submit" class="btn btn-primary">Mettre l'avis</button>
            </form>
        </div>
    </div>
</div>
@endsection