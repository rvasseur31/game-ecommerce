@extends('layouts.app')

@section('css')
<link href="{{ asset('css/floating-labels-edit-text.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-card">
                <div class="card-header text-center">@lang('auth.login')</div>
                <form class="card-body form-signin" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center mb-4">
                        <!-- <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" name="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="@lang('auth.email')"
                            required autofocus>
                        <label for="inputEmail">@lang('auth.email')</label>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            required>
                        <label for="inputPassword">Password</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">@lang('auth.login')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection