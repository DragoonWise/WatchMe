@extends('layouts.app')
@section('description')
Regardez des films en ligne sur WatchMe, depuis votre PC, votre tablette ou votre téléphone.
@endsection
@section('title')
WatchMe - Inscription
@endsection
@section('content')
<h1 class="beige font-weight-bold text-center">{{ __('Register') }}</h1>

<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="d-flex flex-column align-items-center text-light">
        <label for="login" class="beige font-weight-bold fs-20">{{ __('Username') }}</label>
        <input type="text" name="login" id="login"
            class="form-control responsive-input rounded @error('login') is-invalid @enderror"
            value="{{ old('login') }}" required>
        @error('login')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="mail" class="mt-4 beige font-weight-bold fs-20">{{ __('E-Mail Address') }}</label>
        <input type="mail" name="mail" id="mail"
            class="form-control responsive-input rounded @error('mail') is-invalid @enderror" value="{{ old('mail') }}"
            required>
        @error('mail')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="password" class="mt-4 beige font-weight-bold fs-20">{{ __('Password') }}</label>
        <input type="password" name="password" id="password"
            class="form-control responsive-input rounded @error('password') is-invalid @enderror" required>
        @error('password')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="password-confirm" class="mt-4 beige font-weight-bold  fs-20">{{ __('Confirm Password') }}</label>
        <input type="password" name="password-confirmirmation" id="password-confirm"
            class="form-control responsive-input rounded @error('password-confirm') is-invalid @enderror" required>
        @error('password-confirm')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <button type="submit"
            class="btn bg-beige justify-content-center font-weight-bold mt-4 fs-20">{{ __('Register') }}</button>
    </div>


</form>
@endsection