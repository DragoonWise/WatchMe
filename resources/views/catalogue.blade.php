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
    <div id="movie{{ $movie->id }}" class="col-2 float-left">
        <img class="img-fluid" src="{{ $images->getImageURL($movie->urlMiniature) }}" alt="image {{ $movie->title }}"
            title="{{ $movie->title }}">
        <form class="fav-add" action="{{ route('favorite') }}" method="POST">
            @csrf
            <input name="movie_id" type="hidden" value="{{ $movie->id }}">
            @if($movie->isFavorite())
            <div class="fav-btn fav-btn-{{ $movie->id }} btn favicon bg-none fav"><i class="fas fa-star fs-20"></i>
            </div>
            @else
            <div class="fav-btn fav-btn-{{ $movie->id }} btn favicon bg-none"><i class="far fa-star fs-20"></i></div>
            @endif

        </form>
        <div class="carousel-caption d-none d-md-block pb-0">
            <h5 class="semi-grey-bg">{{ $movie->title }}</h5>
        </div>
    </div>
    @endforeach
</div>
@endsection