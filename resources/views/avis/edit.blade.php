@extends('avis') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Mettre à jour l'avis</h1>

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
        <form method="post" action="{{ route('aviss.update', $avis->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nom">Nom :</label>
                <input type="text" class="form-control" name="nom" value={{ $avis->nom }} />
            </div>

            <div class="form-group">
                <label for="note">Note sur 5 :</label>
                <input type="text" class="form-control" name="note" value={{ $avis->note }} />
            </div>

            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" class="form-control" name="titre" value={{ $avis->titre }} />
            </div>
            <div class="form-group">
                <label for="message">Message :</label>
                <input type="text" class="form-control" name="message" value={{ $avis->message }} />
            </div>
            <button type="submit" class="btn btn-primary">Mettre l'avis</button>
        </form>
    </div>
</div>
@endsection