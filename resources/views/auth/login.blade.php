@extends('layouts.app')
@section('description')
Regardez des films en ligne sur WatchMe, depuis votre PC, votre tablette ou votre téléphone.
@endsection
@section('title')
WatchMe - Connexion
@endsection
@section('content')
<h1 class="beige font-weight-bold text-center">{{ __('Login') }}</h1>

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="d-flex flex-column align-items-center text-light">
        <label for="login" class="beige font-weight-bold  fs-20">{{ __('Username') }}</label>
        <input type="text" name="login" id="login"
            class="responsive-input shadow rounded @error('login') is-invalid @enderror" value="{{ old('login') }}"
            required>
        @error('login')
        <div class="invalid-feedback responsive-input">Indentifiant ou mot de passe invalide.</div>
        @enderror
        <label for="password" class="mt-4 beige font-weight-bold  fs-20">{{ __('Password') }}</label>
        <input type="password" name="password" id="password"
            class="responsive-input shadow rounded @error('password') is-invalid @enderror"
            value="{{ old('password') }}" required>
        @if (Route::has('password.request'))
        <a class="beige" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif


        <button type="submit" class="btn bg-beige justify-content-center font-weight-bold mt-4 fs-20 shadow">
            {{ __('Login') }}
        </button>
    </div>
</form>
<div class="text-center mt-4"><a id="login-link" href="{{ url('register') }}"
        class="beige fs-20 text-center mt-4">{{ __('Register') }}</a>
</div>


@endsection