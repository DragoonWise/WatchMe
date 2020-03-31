@extends('layouts.app')
@section('description')
{{ __('main.description') }}@endsection
@section('title')
WatchMe -
@endsection
@section('content')

{{var_dump($videos)}}
@endsection