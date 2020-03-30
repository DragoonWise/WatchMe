@extends('adminlte::page')

@section('title', 'WatchMe Admin')

@section('content_header')
{{-- <h1>@lang('admin.usersmanagement')</h1> --}}
@stop

@section('content')

<form action="" method="POST" class="mx-2 py-2">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <label for="login" class="font-weight-bold fs-20">{{ __('main.login') }}</label>
    <input type="text" name="login" id="login"
        class="form-control shadow-sm rounded @error('login') is-invalid @enderror" value="{{ $user->login }}">
    @error('login')
    <div class="invalid-feedback ">{{ $message }}</div>
    @enderror
    <label for="email" class="mt-4 font-weight-bold fs-20">{{ __('main.email') }}</label>
    <input type="email" name="email" id="email"
        class="form-control  shadow-sm rounded @error('email') is-invalid @enderror" value="{{ $user->email }}">
    @error('email')
    <div class="invalid-feedback ">{{ $message }}</div>
    @enderror
    <button type="submit" name="resetpassword"
        class="btn bg-dark beige font-weight-bold mt-4 fs-20 shadow-sm">{{ __('account.resetpassword') }}</button>
    <button type="submit" name="update"
        class="btn bg-dark beige font-weight-bold mt-4 fs-20 shadow-sm">{{ __('account.update') }}</button>
</form>

@endsection
