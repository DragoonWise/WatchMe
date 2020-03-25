@extends('layouts.app')
@section('description')
Regardez des films en ligne sur WatchMe, depuis votre PC, votre tablette ou votre téléphone.
@endsection
@section('title')
WatchMe - {{ __('Account') }}
@endsection
@section('content')
<h1 class="beige font-weight-bold ml-5">{{ __('Account') }} - {{ Auth::user()->login }}</h1>
<div class="d-lg-flex">
    <div class="col-12 col-lg-4 px-3">
        <div class="bg-beige shadow mb-3 px-2 py-2">
            <h3 class="font-weight-bold">Mes informations</h3>
            <form action="" method="POST" class="mx-2 py-2">
                @csrf
                <label for="login" class="font-weight-bold fs-20">{{ __('Username') }}</label>
                <input type="text" name="login" id="login"
                    class="form-control shadow-sm rounded @error('login') is-invalid @enderror"
                    value="{{ Auth::user()->login }}">
                @error('login')
                <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
                <label for="email" class="mt-4 font-weight-bold fs-20">{{ __('E-Mail Address') }}</label>
                <input type="email" name="email" id="email"
                    class="form-control  shadow-sm rounded @error('email') is-invalid @enderror"
                    value="{{ Auth::user()->email }}">
                @error('email')
                <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
                <label for="password" class="mt-4 font-weight-bold fs-20">{{ __('New Password') }}</label>
                <input type="password" name="password" id="password"
                    class="form-control  shadow-sm rounded @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
                <label for="password-confirm" class="mt-4 font-weight-bold  fs-20">{{ __('Confirm Password') }}</label>
                <input type="password" name="password_confirmation" id="password-confirm"
                    class="form-control  shadow-sm rounded @error('password-confirm') is-invalid @enderror">
                @error('password-confirm')
                <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
                <button type="submit"
                    class="btn bg-dark beige font-weight-bold mt-4 fs-20 shadow-sm">{{ __('Update') }}</button>
            </form>
        </div>
    </div>
    <div class="col-12 col-lg-4 px-3">
        <div class="bg-beige shadow mb-3 px-2 py-2">
            <h3 class="font-weight-bold">Mon abonnement</h3>

        </div>
    </div>
    <div class="col-12 col-lg-4 px-3">
        <div class="bg-beige shadow mb-3 px-2 py-2">
            <h3 class="font-weight-bold">Options</h3>

        </div>
    </div>
</div>

@endsection