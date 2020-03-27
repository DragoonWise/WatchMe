@extends('admin.base')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($movies as $movie)
        <div class="card col-3">
            <img src="{{ $imgHelper->getImageURL($movie->urlMiniature) }}" alt="" class='img-fluid'>
            <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>
            </div>
        </div>



        @endforeach

    </div>
</div>
@endsection
