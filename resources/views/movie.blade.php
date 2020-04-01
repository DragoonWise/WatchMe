@extends('layouts.app')
@section('description')
{{ __('main.description') }}@endsection
@section('title')
WatchMe -
@endsection
@section('content')
{{ var_dump($details) }}
@foreach ($videos as $video)
<h1 class="beige font-weight-bold ml-5">{{$video->name}}</h1>
<div class="bloc-video">
    <iframe id="ytplayer" type="text/html" src="{{$video->url}}" allowfullscreen class="video shadow" frameborder="0" />

</div>

@endforeach

@endsection