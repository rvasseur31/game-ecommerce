@extends('platform') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Mettre à jour une plateforme</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('platforms.update', $platform->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="platform">Plateforme :</label>
                <input type="text" class="form-control" name="platform" value={{ $platform->platform}} />
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour la plateforme</button>
        </form>
    </div>
</div>
@endsection