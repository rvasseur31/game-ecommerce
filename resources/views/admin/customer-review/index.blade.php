@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Avis</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>User id</td>
                        <td>Game id</td>
                        <td>Note sur 5</td>
                        <td>Titre</td>
                        <td>Message</td>
                        <td colspan=3>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customerReviews as $customerReviews)
                    <tr>
                        <td scope="row">{{$customerReviews->id}}</td>
                        <td><a href="{{ url('/user/'.$customerReviews->user_id) }}">{{$customerReviews->user_id}}</a>
                        </td>
                        <td><a
                                href="{{ url('/product/'.$customerReviews->game_platforms_id) }}">{{$customerReviews->game_platforms_id}}</a>
                        </td>
                        <td>{{$customerReviews->rating}}</td>
                        <td>{{$customerReviews->title}}</td>
                        <td>{{$customerReviews->description}}</td>
                        <td>
                            @if($customerReviews->validated == 0)
                            <form
                                action="{{ route('admin-customer-review.confirmCustomerReview', $customerReviews->id)}}"
                                method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Valider l'avis</button>
                            </form>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin-customer-review.edit',$customerReviews->id)}}"
                                class="btn btn-primary">Editer</a>
                        </td>
                        <td>
                            <form action="{{ route('admin-customer-review.destroy', $customerReviews->id)}}"
                                method="post">
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
                <a style="margin: 19px;" href="{{ route('admin-customer-review.create')}}"
                    class="btn btn-primary">Ajouter un avis</a>
            </div>
        </div>
    </div>
</div>
@endsection