@extends('avis')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Avis</h1> 
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
          <td>Id</td>
          <td>User id</td>
          <td>Game id</td>
          <td>Note sur 5</td>
          <td>Titre</td>
          <td>Message</td>
          <td colspan = 2>Boutons</td>
        </tr>
    </thead>
    <tbody>
        @foreach($customerReviews as $customerReviews)
        <tr>
            <td>{{$customerReviews->id}}</td>
            <td>{{$customerReviews->user_id}}</td>
            <td>{{$customerReviews->game_id}}</td>
            <td>{{$customerReviews->rating}}</td>
            <td>{{$customerReviews->title}}</td>
            <td>{{$customerReviews->description}}</td>
            <td>
                <a href="{{ route('customer-review.edit',$customerReviews->id)}}" class="btn btn-primary">Editer</a>
            </td>
            <td>
                <form action="{{ route('customer-review.destroy', $customerReviews->id)}}" method="post">
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
        <a style="margin: 19px;" href="{{ route('customer-review.create')}}" class="btn btn-primary">Ajouter un avis</a>
    </div> 
<div>
</div>
@endsection