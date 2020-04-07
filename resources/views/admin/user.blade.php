@extends('adminlte::page')

@section('title', 'WatchMe Admin')

@section('content_header')
{{-- <h1>@lang('admin.usersmanagement')</h1> --}}
@stop

@section('content')

<form action="" method="POST" class="mx-2 py-2">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <div class="form-group">
        <label for="login" class="font-weight-bold fs-20">@lang('main.login')</label>
        <input type="text" name="login" id="login"
            class="form-control shadow-sm rounded @error('login') is-invalid @enderror" value="{{ $user->login }}">
        @error('login')
        <div class="invalid-feedback ">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email" class="mt-4 font-weight-bold fs-20">@lang('main.email')</label>
        <input type="email" name="email" id="email"
            class="form-control  shadow-sm rounded @error('email') is-invalid @enderror" value="{{ $user->email }}">
        @error('email')
        <div class="invalid-feedback ">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-check">
        <input type="checkbox" name="parental_control" id="parental_control" class="form-check-input mt-2"
            {{ $user->parental_control == 1 ? 'checked':'' }}>
        <label for="parental_control" class="font-weight-bold fs-20">@lang('account.parental')</label>
        <p>@lang('account.parental_description') }}</p>
    </div>
    <div class="form-group">
        <h3 class="font-weight-bold">@lang('admin.usersubscription')</h3>
        <div class="btn-group btn-group-toggle row" data-toggle="">
            <label class="col-12">
                <input type="radio" name='formula' {{ $user->subscription_id == null ? "checked":"" }} value=null> @lang('admin.nosub')
            </label>
            @foreach ($sub as $item)
            <label class="col-12">
                <input type="radio" name='formula' value="{{$item->id}}" {{ $item->id == $user->subscription_id ? "checked":"" }}> {{$item->formula}}
            </label>
            @endforeach
        </div>
    </div>
    <button type="submit" name="resetpassword"
        class="btn bg-dark beige font-weight-bold mt-4 fs-20 shadow-sm">@lang('admin.resetpassword')</button>
    <button type="submit" name="update"
        class="btn bg-dark beige font-weight-bold mt-4 fs-20 shadow-sm">@lang('account.update')</button>
</form>

@endsection
