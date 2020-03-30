@extends('layouts.app')
@section('description')
{{ __('main.description') }}
@endsection
@section('title')
WatchMe
@endsection
@section('content')

<h4 class="pl-5 beige font-weight-bold mt-3">{{ __('main.news') }}</h4>
<div class="text-center my-3">
    <div id="newsCarousel" class="carousel slide w-100">
        <div class="carousel-inner w-100" role="listbox">
            @php $count = 0;
            $countactive = 1 @endphp
            @foreach($news as $new)
            @if($count == 0)
            <div class="carousel-item row no-gutters {{ ($countactive == 1)?"active":"" }}">
                @endif
                <div class="col-2 float-left">
                    <img class="img-fluid" src="{{ $images->getImageURL($new->urlMiniature) }}"
                        alt="image {{ $new->title }}" title="{{ $new->title }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="semi-grey-bg">{{ $new->title }}</h5>
                    </div>
                </div>
                @php $count++;
                $countactive++ @endphp
                @if($count == 6)
            </div>
            @php $count = 0 @endphp
            @endif
            @endforeach
        </div>
        <a class="carousel-control-prev justify-content-start pl-2 slide-icon" href="#newsCarousel" role="button"
            data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('main.previous') }}</span>
        </a>
        <a class="carousel-control-next justify-content-end pr-2 slide-icon" href="#newsCarousel" role="button"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('main.next') }}</span>
        </a>
    </div>
</div>
</div>
<h4 class="pl-5 beige font-weight-bold mt-3">{{ __('main.top') }}</h4>
<div class="text-center my-3">
    <div id="topCarousel" class="carousel slide w-100">
        <div class="carousel-inner w-100" role="listbox">
            @php $count = 0;
            $countactive = 1 @endphp
            @foreach($tops as $top)
            @if($count == 0)
            <div class="carousel-item row no-gutters {{ ($countactive == 1)?"active":"" }}">
                @endif
                <div class="col-2 float-left">
                    <img class="img-fluid" src="{{ $images->getImageURL($top->urlMiniature) }}"
                        alt="image {{ $top->title }}" title="{{ $top->title }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="semi-grey-bg">{{ $top->title }}</h5>
                    </div>
                </div>
                @php $count++;
                $countactive++ @endphp
                @if($count == 6)
            </div>
            @php $count = 0 @endphp
            @endif
            @endforeach
        </div>
        <a class="carousel-control-prev justify-content-start pl-2 slide-icon" href="#topCarousel" role="button"
            data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('main.previous') }}</span>
        </a>
        <a class="carousel-control-next justify-content-end pr-2 slide-icon" href="#topCarousel" role="button"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('main.next') }}</span>
        </a>
    </div>
</div>
</div>
<h4 class="pl-5 beige font-weight-bold mt-3">{{ __('main.advice') }}</h4>
<div class="text-center my-3">
    <div id="adviceCarousel" class="carousel slide w-100">
        <div class="carousel-inner w-100" role="listbox">
            <div class="carousel-item row no-gutters active">
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/222/fff?text=1">
                </div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/444?text=2"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/888?text=3"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/111/fff?text=4">
                </div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/111/fff?text=5">
                </div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/111/fff?text=6">
                </div>
            </div>
            <div class="carousel-item row no-gutters">
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280?text=7">
                </div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/555?text=8"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/333/fff?text=9">
                </div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/bbb?text=10">
                </div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/bbb?text=11">
                </div>
                <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280/bbb?text=12">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev justify-content-start pl-2 slide-icon" href="#adviceCarousel" role="button"
            data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('main.previous') }}</span>
        </a>
        <a class="carousel-control-next justify-content-end pr-2 slide-icon" href="#adviceCarousel" role="button"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('main.next') }}</span>
        </a>
    </div>
</div>


@endsection