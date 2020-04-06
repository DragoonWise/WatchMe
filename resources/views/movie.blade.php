@extends('layouts.app')
@section('description')
@lang('main.description')
@endsection
@section('title')
WatchMe - {{ $details->title }}
@endsection
@section('content')
<div class="mx-5">
    <h1 class="beige font-weight-bold">{{ $details->title }}</h1>
    <p class="beige"><span class="font-weight-bold">Genre(s) :</span>
        @foreach ($details->genres as $genres)
        {{ $genres['name'] }}
        @endforeach</p>
    <p class="beige"><span class="font-weight-bold">Date de sortie : </span>{{ $details->release_date }}</p>
    <p class="beige"><span class="font-weight-bold">Synopsis : </span>{{ $details->overview }}</p>
</div>
@if(!empty($videos))
<div class='video-responsive'>
    <iframe src='{{ $videos[0]->url }}' class='video shadow' frameborder='0'
        allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
</div>
@else
<p class='text-center font-weight-bold beige'>Il n'y a pas de vidéo pour ce film.</p>

@endif
<h2 class="beige font-weight-bold text-center">Films Similaires</h2>
@foreach($movie->getSimilars() as $sim)
<div id="movie{{ $sim->id }}" class="col-3 float-left">
    <a href="{{ route('movie.id', ['id'=>$sim->id]) }}"><img class="img-fluid"
            src="{{ $images->getImageURL($sim->urlMiniature) }}" alt="image {{ $sim->title }}"
            title="{{ $sim->title }}"></a>
    <form class="fav-add" action="{{ route('favorite') }}" method="POST">
        @csrf
        <input name="movie_id" type="hidden" value="{{ $sim->id }}">
        @if($sim->isFavorite())
        <div class="fav-btn fav-btn-{{ $sim->id }} btn favicon bg-none fav"><i
                class="fas fa-star fs-20"></i></div>
        @else
        <div class="fav-btn fav-btn-{{ $sim->id }} btn favicon bg-none"><i
                class="far fa-star fs-20"></i></div>
        @endif

    </form>
</div>
@endforeach
@endsection
