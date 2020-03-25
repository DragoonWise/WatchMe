@extends('layouts.app')
@section('description')
{{ __('main.description') }}
@endsection
@section('title')
WatchMe - {{ __('main.connection') }}
@endsection
@section('content')
<h1 class="beige font-weight-bold text-center">{{ __('main.connection') }}</h1>

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="d-flex flex-column align-items-center text-light">
        <label for="login" class="beige font-weight-bold  fs-20">{{ __('main.login') }}</label>
        <input type="text" name="login" id="login"
            class="responsive-input shadow rounded @error('login') is-invalid @enderror" value="{{ old('login') }}"
            required>
        @error('login')
        <div class="invalid-feedback responsive-input">{{ __('main.loginerror') }}</div>
        @enderror
        <label for="password" class="mt-4 beige font-weight-bold  fs-20">{{ __('main.pwd') }}</label>
        <input type="password" name="password" id="password"
            class="responsive-input shadow rounded @error('password') is-invalid @enderror"
            value="{{ old('password') }}" required>
        @if (Route::has('password.request'))
        <a class="beige" href="{{ route('password.request') }}">
            {{ __('main.pwdforgot') }}
        </a>
        @endif


        <button type="submit" class="btn bg-beige justify-content-center font-weight-bold mt-4 fs-20 shadow">
            {{ __('main.connection') }}
        </button>
    </div>
</form>
<div class="text-center mt-4"><a id="login-link" href="{{ url('register') }}"
        class="beige fs-20 text-center mt-4">{{ __('main.register') }}</a>
</div>


@endsection