@extends('admin.base')
@section('content')
@foreach ($movies as $movie)
{{ $movie->title }}
<img src="{{ $imgHelper->getImageURL($movie->urlMiniature) }}" alt="">

@endforeach
@endsection
