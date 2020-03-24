@extends('layouts.app')
@section('description')
Regardez des films en ligne sur WatchMe, depuis votre PC, votre tablette ou votre téléphone.
@endsection
@section('title')
WatchMe
@endsection
@section('content')


<h4 class="pl-5 beige font-weight-bold">Les nouveautés WatchMe</h4>
<div class="text-center my-3">
    <div id="newsCarousel" class="carousel slide w-100">
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
        <a class="carousel-control-prev justify-content-start pl-2 slide-icon" href="#newsCarousel" role="button"
            data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next justify-content-end pr-2 slide-icon" href="#newsCarousel" role="button"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<h4 class="pl-5 beige font-weight-bold">Le top WatchMe</h4>
<div class="text-center my-3">
    <div id="topCarousel" class="carousel slide w-100">
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
        <a class="carousel-control-prev justify-content-start pl-2 slide-icon" href="#topCarousel" role="button"
            data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next justify-content-end pr-2 slide-icon" href="#topCarousel" role="button"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<h4 class="pl-5 beige font-weight-bold">Films conseillés pour vous</h4>
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
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next justify-content-end pr-2 slide-icon" href="#adviceCarousel" role="button"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


@endsection