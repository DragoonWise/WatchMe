@extends('layouts.app')
@section('description')
{{ __('main.description') }}@endsection
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
@php
if(!empty($videos)){
echo "<div class='video-responsive'>
    <iframe src='{$videos[0]->url}' class='video shadow' frameborder='0'
        allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
</div>";
}else{
echo "<p class='text-center font-weight-bold beige'>Il n'y a pas de vidéo pour ce film.</p>";
}
@endphp

@endsection