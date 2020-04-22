@extends('layouts.admin')

@section('css')
<style>
#preview {
    width: 200px;
}
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <br>
        <h1 class="display-4">Ajouter un jeu</h1>
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
            <form method="post" action="{{ route('admin-game.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="select-platform" >Selectionner une plateforme : </label>
                    <select class="form-control" id="select-platform" name="platform_id">
                        @foreach($platforms as $platform)
                        <option value="{{ $platform->id }}">{{ $platform->platform }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group{{ $errors->has('image') ? ' is-invalid' : '' }}">
                    <div class="custom-file">
                        <input type="file" id="image" name="image"
                            class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input" required>
                        <label class="custom-file-label" for="image">Choississez l'image principal</label>
                        @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                        @endif
                    </div>
                    <br>
                </div>
                <div class="form-group">
                    <img id="preview" class="img-fluid" src="#" alt="">
                </div>
                <div class="form-group">
                    <label for="stock">Entrer le nombre de jeu :</label>
                    <input type="number" class="form-control" name="stock" />
                </div>
                <div class="form-group">
                    <label for="price">Entrer le prix du jeu :</label>
                    <input type="number" step="0.01" class="form-control" name="price" />
                </div>
                <div class="form-group">
                    <label for="release_date">Entrer la date de sortie du jeu :</label>
                    <input type="date" step="0.01" class="form-control" name="release_date" />
                </div>
                <button type="submit" class="btn btn-primary">Ajouter le jeu</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(() => {
    $('input[type="file"]').on('change', (e) => {
        let that = e.currentTarget
        if (that.files && that.files[0]) {
            $(that).next('.custom-file-label').html(that.files[0].name)
            let reader = new FileReader()
            reader.onload = (e) => {
                $('#preview').attr('src', e.target.result)
            }
            reader.readAsDataURL(that.files[0])
        }
    })
})
</script>
@endsection