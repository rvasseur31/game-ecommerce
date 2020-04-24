@extends('layouts.admin')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
     <br>
    <h1 class="display-4">Ajouter une plateforme</h1>
    <br>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('admin-platform.store') }}">
          @csrf
          <div class="form-group">
              <label for="platform">Plateforme :</label>
              <input type="text" class="form-control" name="platform"/>
          </div>                
          <button type="submit" class="btn btn-primary">Ajouter une plateforme</button>
      </form>
  </div>
</div>
</div>
@endsection