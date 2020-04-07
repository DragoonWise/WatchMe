@extends('layouts.app')
@section('description')
@lang('main.description')
@endsection
@section('title')
WatchMe - @lang('main.account')
@endsection
@section('content')
<h1 class="beige font-weight-bold ml-5">@lang('main.account') - {{ Auth::user()->login }}</h1>
<div class="d-lg-flex">
    <div class="col-12 col-lg-4 px-3">
        <div class="bg-beige shadow mb-3 px-2 py-2 min-h">
            <h3 class="font-weight-bold">@lang('account.infos')</h3>
            <form action="" method="POST" class="mx-2 py-2">
                @csrf
                <label for="login" class="font-weight-bold fs-20">@lang('main.login')</label>
                <input type="text" name="login" id="login"
                    class="form-control shadow-sm rounded @error('login') is-invalid @enderror"
                    value="{{ Auth::user()->login }}">
                @error('login')
                <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
                <label for="email" class="mt-4 font-weight-bold fs-20">@lang('main.email')</label>
                <input type="email" name="email" id="email"
                    class="form-control  shadow-sm rounded @error('email') is-invalid @enderror"
                    value="{{ Auth::user()->email }}">
                @error('email')
                <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
                <label for="password" class="mt-4 font-weight-bold fs-20">@lang('account.newpwd')</label>
                <input type="password" name="password" id="password"
                    class="form-control  shadow-sm rounded @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
                <label for="password-confirm" class="mt-4 font-weight-bold  fs-20">@lang('main.pwdconfirm')</label>
                <input type="password" name="password_confirmation" id="password-confirm"
                    class="form-control  shadow-sm rounded @error('password-confirm') is-invalid @enderror">
                @error('password-confirm')
                <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
                <button type="submit" name="update"
                    class="btn bg-dark beige font-weight-bold mt-4 fs-20 shadow-sm">@lang('account.update')</button>
            </form>
        </div>
    </div>
    <div class="col-12 col-lg-4 px-3">
        <div class="bg-beige shadow mb-3 px-2 py-2 min-h">
            <h3 class="font-weight-bold">@lang('account.subscription')</h3>
            @if (Auth::user()->subscription_id == null)
            <p>@lang('account.nosub')</p>
            <a class="btn btn-dark beige fs-20 shadow-sm font-weight-bold" href="{{ route('subscription') }}">
                @lang('main.add')
            </a>
            @else
            <p><span class="font-weight-bold">Abonnement : </span>@foreach($subscription as
                $sub){{ $sub->formula }}@endforeach</p>
            <p><span class="font-weight-bold">Depuis le : </span>@foreach($billing as
                $bil){{ $bil->created_at }}@endforeach</p>

            <a class="btn btn-dark beige fs-20 shadow-sm font-weight-bold" href="">
                {{ __('main.remove') }}
            </a>
            @endif

        </div>
    </div>
    <div class="col-12 col-lg-4 px-3">
        <div class="bg-beige shadow mb-3 px-2 py-2 min-h">
            <h3 class="font-weight-bold">@lang('account.options')</h3>
            <form id="parental-form" action="" method="POST" class="mx-2">
                @csrf
                <input type="hidden" name="parental_control_hidden">
                <div class="form-check">
                    <input type="checkbox" name="parental_control" id="parental_control" class="form-check-input mt-2"
                        {{ Auth::user()->parental_control == 1 ? 'checked':'' }}
                        onclick="document.getElementById('parental-form').submit();">
                    <label for="parental_control" class="font-weight-bold fs-20">@lang('account.parental')</label>
                    <p>@lang('account.parental_description')</p>
                </div>

            </form>
            <a class="btn btn-dark beige fs-20 shadow-sm font-weight-bold" href="{{ route('log') }}">
                @lang('account.log')
            </a>
        </div>
    </div>
</div>

@endsection
