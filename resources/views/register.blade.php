@extends('layouts.app')
@section('description')
Regardez des films en ligne sur WatchMe, depuis votre PC, votre tablette ou votre téléphone.
@endsection
@section('title')
WatchMe - Inscription
@endsection
@section('content')
<form action="" method="POST">
    @csrf
    <div class="d-flex flex-column align-items-center text-light">
        <label for="login" class="beige font-weight-bold fs-20">Identifiant</label>
        <input type="text" name="login" id="login"
            class="form-control responsive-input rounded @error('login') is-invalid @enderror"
            value="{{ old('login') }}">
        @error('login')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="mail" class="mt-4 beige font-weight-bold fs-20">Email</label>
        <input type="mail" name="mail" id="mail"
            class="form-control responsive-input rounded @error('mail') is-invalid @enderror" value="{{ old('mail') }}">
        @error('mail')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="password" class="mt-4 beige font-weight-bold fs-20">Mot de passe</label>
        <input type="password" name="password" id="password"
            class="form-control responsive-input rounded @error('password') is-invalid @enderror">
        @error('password')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="password-confirmation" class="mt-4 beige font-weight-bold  fs-20">Confirmer le mot de passe</label>
        <input type="password" name="password-confirmation" id="password-confirmation"
            class="form-control responsive-input rounded @error('password-confirmation') is-invalid @enderror">
        @error('password-confirmation')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <button type="submit"
            class="btn bg-beige justify-content-center font-weight-bold mt-4 fs-20">Inscription</button>
    </div>


</form>
@endsection