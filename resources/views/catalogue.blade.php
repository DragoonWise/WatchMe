@extends('layouts.app')
@section('description')
{{ __('main.description') }}
@endsection
@section('title')
WatchMe - {{ __('main.catalog') }}
@endsection
@section('content')
<div class="row">
    @foreach($all as $movie)
    <div id="movie{{ $movie->id }}" class="col-2 mb-2">
        <img class="img-fluid" src="{{ $images->getImageURL($movie->urlMiniature) }}" alt="image {{ $movie->title }}"
            title="{{ $movie->title }}">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="semi-grey-bg">{{ $movie->title }}</h5>
        </div>
    </div>
    @endforeach
</div>
@endsection