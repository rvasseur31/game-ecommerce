@extends('layouts.admin')

@section('content')
<div class="add-game-step-one">
    <h1 class="display-4 pt-5">Ajouter un jeu</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du jeu</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
            <form method="post" action="{{ route('admin-game.store-step-one') }}">
                @csrf
                <input type='hidden' name='game_id' value="{{ $game->id }}">
                <tr>
                    <th scope="row">{{ $game->id }}</th>
                    <td>{{ $game->title }}</td>
                    <td>{{ $game->description }}</td>
                    <td><button type="submit" class="btn btn-link">Selectionner</button></td>
                </tr>
            </form>
            @endforeach
            <form method="post" action="{{ route('admin-game.store-step-one') }}">
                @csrf
                <tr>
                    <th scope="row">Nouveau:</th>
                    <td>
                        <div class="form-group">
                            <input class="form-control transparent-input" type='text' name='title'
                                placeholder="Nom du jeu :" required>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input class="form-control transparent-input" type='text' name='description'
                                placeholder="Description :" required>
                        </div>
                    </td>
                    <td><button type="submit" class="btn btn-link">Selectionner</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>
@endsection