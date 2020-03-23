@extends('layouts.app')
@section('description')
Regardez des films en ligne sur WatchMe, depuis votre PC, votre tablette ou votre téléphone.
@endsection
@section('title')
WatchMe - Connexion
@endsection
@section('content')
<form action="" method="POST">
    @csrf
    <div class="d-flex flex-column align-items-center text-light">
        <label for="login" class="beige font-weight-bold  fs-20">Identifiant</label>
        <input type="text" name="login" id="login" class="responsive-input rounded">
        <label for="password" class="mt-4 beige font-weight-bold  fs-20">Mot de passe</label>
        <input type="text" name="password" id="password" class="responsive-input rounded">
        <button type="submit" class="btn bg-beige justify-content-center font-weight-bold mt-4 fs-20">Connexion</button>
    </div>
</form>
<div class="text-center"><a id="login-link" href="{{ url('register') }}" class="beige fs-20 text-center">S'inscrire</a>
</div>


@endsection