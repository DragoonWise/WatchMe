@extends('layouts.app')
@section('description')
@lang('main.description')
@endsection
@section('title')
WatchMe - @lang('main.favorites')
@endsection
@section('content')
<h1 class="beige font-weight-bold mx-5">@lang('main.favorites')</h1>
<div class="row mx-md-2">
    @foreach($favorites as $favorite)
    <div id="movie{{ $favorite->id }}" class="col-lg-2 col-md-4 col-12 float-left mb-4">
        <a href="{{ route('movie.id', ['id'=>$favorite->id]) }}"><img class="img-fluid"
                src="{{ $images->getImageURL($favorite->urlMiniature) }}" alt="image {{ $favorite->title }}"
                title="{{ $favorite->title }}"></a>
        <form class="fav-add" action="{{ route('favorite') }}" method="POST">
            @csrf
            <input name="movie_id" type="hidden" value="{{ $favorite->id }}">
            @if($favorite->isFavorite())
            <div class="fav-btn fav-btn-{{ $favorite->id }} btn favicon bg-none fav"><i class="fas fa-star fs-20"></i>
            </div>
            @else
            <div class="fav-btn fav-btn-{{ $favorite->id }} btn favicon bg-none"><i class="far fa-star fs-20"></i></div>
            @endif

        </form>
        <div class="carousel-caption d-none d-md-block pb-0">
            <h5 class="semi-grey-bg">{{ $favorite->title }}</h5>
        </div>
    </div>
    @endforeach
</div>
@endsection
