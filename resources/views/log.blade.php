@extends('layouts.app')
@section('description')
@lang('main.description')
@endsection
@section('title')
WatchMe - @lang('account.log')
@endsection
@section('content')
<div class="container bg-beige mb-5 shadow">
    <h1 class="text-center pt-2 font-weight-bold">@lang('account.log')</h1>
    <hr>
    @foreach($userlogs as $log)
    <p><span class="font-weight-bold">IP :</span> {{$log->ip}}</p>
    <p><span class="font-weight-bold">Date de connexion :</span> {{$log->created_at}}</p>
    <hr>
    @endforeach
</div>
@endsection