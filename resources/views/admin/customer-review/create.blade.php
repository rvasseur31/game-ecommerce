@extends('avis')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
     <br>
    <h1 class="display-4">Ajouter un avis</h1>
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
      <form method="post" action="{{ route('admin-customer-review.store') }}">
          @csrf
          <div class="form-group">    
              <label for="nom">Nom utilisateur (id) :</label>
              <input type="text" class="form-control" name="nom"/>
          </div>

          <div class="form-group">
              <label for="note">Note sur 5 :</label>
              <input type="text" class="form-control" name="note"/>
          </div>

          <div class="form-group">
              <label for="titre">Titre:</label>
              <input type="text" class="form-control" name="titre"/>
          </div>
          <div class="form-group">
              <label for="message">Description:</label>
            <textarea type="text" class="form-control" name="message"></textarea>
          </div>                    
          <button type="submit" class="btn btn-primary">Ajouter un avis</button>
      </form>
  </div>
</div>
</div>
@endsection