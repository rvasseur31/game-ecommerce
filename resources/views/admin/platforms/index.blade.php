@extends('platform')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Platformes</h1> 
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
          <td>Platform</td>
          <td colspan = 2>Boutons</td>
        </tr>
    </thead>
    <tbody>
        @foreach($platforms as $platform)
        <tr>
            <td>{{$platform->id}}</td>
            <td>{{$platform->platform}}</td>
            <td>
                <a href="{{ route('admin-platforms.edit', $platform->id)}}" class="btn btn-primary">Editer</a>
            </td>
            <td>
                <form action="{{ route('admin-platforms.destroy', $platform->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    <div>
        <a style="margin: 19px;" href="{{ route('admin-platforms.create') }}" class="btn btn-primary">Ajouter une plateforme</a>
    </div> 
<div>
</div>
@endsection