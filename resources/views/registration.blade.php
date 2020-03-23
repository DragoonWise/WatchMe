@extends('layouts.app')
@section('description')
Regardez des films en ligne sur WatchMe, depuis votre PC, votre tablette ou votre téléphone.
@endsection
@section('title')
WatchMe - Inscription
@endsection
@section('content')
<form action="{{ url('users') }}" method="POST">
    @csrf
    <div class="d-flex flex-column align-items-center text-light">
        <label for="login" class="beige font-weight-bold  fs-20">Identifiant</label>
        <input type="text" name="login" id="login" class="responsive-input">
        <label for="mail" class="beige font-weight-bold  fs-20">Email</label>
        <input type="text" name="mail" id="mail" class="responsive-input">
        <label for="password" class="mt-4 beige font-weight-bold  fs-20">Mot de passe</label>
        <input type="text" name="password" id="password" class="responsive-input">
        <label for="password-confirmation" class="mt-4 beige font-weight-bold  fs-20">Mot de passe</label>
        <input type="text" name="password-confirmation" id="password-confirmation" class="responsive-input">
        <button type="submit" class="btn bg-beige justify-content-center font-weight-bold mt-4 fs-20">Connexion</button>
    </div>


</form>
@endsection