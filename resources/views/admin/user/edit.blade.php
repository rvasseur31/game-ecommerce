@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Mettre à jour un utilisateur</h1>
        <form method="post" action="{{ route('admin-user.update', $user->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="lastname">Nom :</label>
                <input type="text" class="form-control" name="lastname" value="{{ $user->lastname}}" />
            </div>
            <div class="form-group">
                <label for="firstname">Prénom :</label>
                <input type="text" class="form-control" name="firstname" value="{{ $user->firstname}}" />
            </div>
            <div class="form-group">
                <label for="email">Adresse email :</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email}}" />
            </div>
            <div class="form-group">
                <label for="born_date">Date de naissance :</label>
                <input type="date" class="form-control" name="born_date" value="{{ $user->born_date}}" />
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour le profil de l'utilisateur</button>
        </form>
    </div>
</div>
@endsection