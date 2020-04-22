@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Utilisateurs</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Email</td>
                    <td>Solde</td>
                    <td>XP</td>
                    <td>Date de naissance</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->balance}} €</td>
                    <td>{{$user->xp}}</td>
                    <td>{{$user->born_date}}</td>
                    <td>
                        <a href="{{ route('admin-user.edit', $user->id)}}" class="btn btn-primary">Editer</a>
                    </td>
                    <td>
                        <form action="{{ route('admin-user.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection