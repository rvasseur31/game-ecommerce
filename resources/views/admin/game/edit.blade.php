@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <br>
        <h1 class="display-4">Modifier un jeu</h1>
        <br>
        <div>
            <form method="post" action="{{ route('admin-game.update', $game->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="select-platform">Selectionner une plateforme : </label>
                    <select class="form-control" id="select-platform" name="platform_id">
                        @foreach($platforms as $platform)
                        <option value="{{ $platform->id }}" {{ $platform->id == $game->platform_id ? "selected" : "" }}>{{ $platform->platform }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Entrer le prix du jeu :</label>
                    <input type="number" step="0.01" class="form-control" name="price" value="{{ $game->price }}" />
                </div>
                <div class="form-group">
                    <label for="release_date">Entrer la date de sortie du jeu :</label>
                    <input type="date" class="form-control" name="release_date" value="{{ $game->release_date }}" />
                </div>
                <button type="submit" class="btn btn-primary">Modifier le jeu</button>
            </form>
        </div>
    </div>
</div>
@endsection