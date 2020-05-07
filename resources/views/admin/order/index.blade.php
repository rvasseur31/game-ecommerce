@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Les commandes :</h1>
        <div class="col-sm-12">
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->lastname}}</td>
                    <td>{{$order->firstname}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <a href="{{ url('/invoice/'.$order->user_id.'/'.$order->id) }}" class="btn btn-primary">Voir la
                            facture</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection