@extends('admin.base')
@section('content')
{{ $movie->title }}
<img src="{{ $imgHelper->getImageURL($movie->urlMiniature) }}" alt="">
@endsection
