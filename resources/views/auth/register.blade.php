@extends('layouts.app')
@section('description')
Regardez des films en ligne sur WatchMe, depuis votre PC, votre tablette ou votre téléphone.
@endsection
@section('title')
WatchMe - Inscription
@endsection
@section('content')
<h1 class="beige font-weight-bold text-center">{{ __('main.register') }}</h1>

<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="d-flex flex-column align-items-center text-light">
        <label for="login" class="beige font-weight-bold fs-20">{{ __('main.login') }}</label>
        <input type="text" name="login" id="login"
            class="form-control responsive-input shadow rounded @error('login') is-invalid @enderror"
            value="{{ old('login') }}" required>
        @error('login')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="email" class="mt-4 beige font-weight-bold fs-20">{{ __('main.email') }}</label>
        <input type="email" name="email" id="email"
            class="form-control responsive-input shadow rounded @error('email') is-invalid @enderror"
            value="{{ old('email') }}" required>
        @error('email')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="password" class="mt-4 beige font-weight-bold fs-20">{{ __('main.pwd') }}</label>
        <input type="password" name="password" id="password"
            class="form-control responsive-input shadow rounded @error('password') is-invalid @enderror" required>
        @error('password')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="password-confirm" class="mt-4 beige font-weight-bold  fs-20">{{ __('main.pwdconfirm') }}</label>
        <input type="password" name="password_confirmation" id="password-confirm"
            class="form-control responsive-input shadow rounded @error('password-confirm') is-invalid @enderror"
            required>
        @error('password-confirm')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <button type="submit"
            class="btn bg-beige justify-content-center font-weight-bold mt-4 fs-20 shadow">{{ __('main.register') }}</button>
    </div>


</form>
@endsection