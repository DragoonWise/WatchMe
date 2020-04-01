@extends('layouts.app')
@section('description')
{{ __('main.description') }}
@endsection
@section('title')
WatchMe
@endsection
@section('content')
<h1 class="beige font-weight-bold mx-5">Recherche</h1>
<div class="row mx-md-2">
    @if(!is_null($results))
    @foreach($results as $result)
    <div id="movie{{ $result->id }}" class="col-lg-2 col-md-4 col-12 float-left mb-4">
        <a href="{{ route('movie.id', ['id'=>$result->id]) }}"><img class="img-fluid"
                src="{{ $images->getImageURL($result->urlMiniature) }}" alt="image {{ $result->title }}"
                title="{{ $result->title }}"></a>
        <form class="fav-add" action="{{ route('favorite') }}" method="POST">
            @csrf
            <input name="movie_id" type="hidden" value="{{ $result->id }}">
            @if($result->isFavorite())
            <div class="fav-btn fav-btn-{{ $result->id }} btn favicon bg-none fav"><i class="fas fa-star fs-20"></i>
            </div>
            @else
            <div class="fav-btn fav-btn-{{ $result->id }} btn favicon bg-none"><i class="far fa-star fs-20"></i></div>
            @endif

        </form>
        <div class="carousel-caption d-none d-md-block pb-0">
            <h5 class="semi-grey-bg">{{ $result->title }}</h5>
        </div>
    </div>
    @endforeach
    @else
    <p class="beige fs-20 font-weight-bold mx-auto">Aucun résultat.</p>
    @endif

</div>
@endsection