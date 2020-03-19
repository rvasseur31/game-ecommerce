@extends('layouts.app')

@section('css')
<link href="{{ asset('css/floating-labels-edit-text.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">@lang('auth.register')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="form-label-group flg-with-row col-md-6">
                                <input type="text" id="lastname" name="lastname"
                                    class="form-control @error('lastname') is-invalid @enderror"
                                    placeholder="@lang('auth.lastname')" required autofocus>
                                <label for="lastname">@lang('auth.lastname')</label>
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-label-group flg-with-row col-md-6">
                                <input type="text" id="firstname" name="firstname"
                                    class="form-control @error('firstname') is-invalid @enderror"
                                    placeholder="@lang('auth.firstname')" required autofocus>
                                <label for="firstname">@lang('auth.firstname')</label>
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="@lang('auth.email')" required autofocus>
                            <label for="email">@lang('auth.email')</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="@lang('auth.password')" required autofocus>
                            <label for="password">@lang('auth.password')</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="confirm-password" name="password_confirmation"
                                class="form-control" placeholder="@lang('auth.confirm-password')" required autofocus>
                            <label for="confirm-password">@lang('auth.confirm-password')</label>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button class="btn btn-lg btn-primary btn-block"
                                    type="submit">@lang('auth.register')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection