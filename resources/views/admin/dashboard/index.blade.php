@extends('layouts.admin')

@section('content')
<div class="container-info">
    <h1>Informations principales</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Information</th>
                <th scope="col">Valeur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Membres :</th>
                <td>{{ $totalUsers }}</td>
            </tr>
            <tr>
                <th scope="row">Nombre de ventes :</th>
                <td>{{ $totalGamesBuy }}</td>
            </tr>
            <tr>
                <th scope="row">Nombre de jeu acheté sur les 7 derniers jours :</th>
                <td>{{ $lastSevenDaysGamesBuy }}</td>
            </tr>
            <tr>
                <th scope="row">Revenu total :</th>
                <td>{{ $totalIncome }} €</td>
            </tr>
            <tr>
                <th scope="row">Revenu sur les 7 derniers jours :</th>
                <td>{{ $lastSevenDaysIncome }} €</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection