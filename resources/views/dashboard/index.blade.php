@extends('layouts.admin')

@section('content')
<div class="container-info">
    <h1>Informations principales</h1>
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card bg-dark text-white shadow" style="width: 18rem;">
                <div class="card-body">
                    <h2 class="card-title">Membres :</h2>
                    <p class="card-text text-center">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card bg-dark text-white shadow" style="width: 18rem;">
                <div class="card-body">
                    <h2 class="card-title">Nombre de ventes :</h2>
                    <p class="card-text text-center">{{ $totalGamesBuy }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card bg-dark text-white shadow" style="width: 18rem;">
                <div class="card-body">
                    <h2 class="card-title">Revenu total :</h2>
                    <p class="card-text text-center">{{ $totalIncome }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card bg-dark text-white shadow" style="width: 18rem;">
                <div class="card-body">
                    <h2 class="card-title">Revenu sur les 7 derniers jours :</h2>
                    <p class="card-text text-center">{{ $lastSevenDaysIncome }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card bg-dark text-white shadow" style="width: 18rem;">
                <div class="card-body">
                    <h2 class="card-title">Nombre de jeu acheté sur les 7 derniers jours :</h2>
                    <p class="card-text text-center">{{ $lastSevenDaysGamesBuy }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection