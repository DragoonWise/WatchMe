<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @guest
        {{-- WatchMe Logo --}}
        <div class="container d-flex justify-content-center">
            <a href="{{ url('/') }}">
                <img src="https://i.ibb.co/tY3SpjN/watchme.png" alt="watchme" title="Logo WatchMe" class="img-fluid"
                    border="0">
            </a>
        </div>
        {{-- Login/Register content --}}
        <main class="py-4">
            @yield('content')
        </main>

        <h4 class="pl-5 beige font-weight-bold">Les nouveautés WatchMe</h4>
        <div class="text-center my-3">
            <div id="newsCarousel" class="carousel slide w-100">
                <div class="carousel-inner w-100" role="listbox">
                    <div class="carousel-item row no-gutters active">
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/222/fff?text=1">
                        </div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/444?text=2"></div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/888?text=3"></div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/111/fff?text=4">
                        </div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/111/fff?text=5">
                        </div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/111/fff?text=6">
                        </div>
                    </div>
                    <div class="carousel-item row no-gutters">
                        <div class="col-2 float-left"><img class="img-fluid" src="http://placehold.it/350x280?text=7">
                        </div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/555?text=8"></div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/333/fff?text=9">
                        </div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/bbb?text=10">
                        </div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/bbb?text=11">
                        </div>
                        <div class="col-2 float-left"><img class="img-fluid"
                                src="http://placehold.it/350x280/bbb?text=12">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev justify-content-start pl-2 slide-icon" href="#newsCarousel"
                    role="button" data-slide="prev">
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
    </div>
    @else
    {{-- Header --}}
    <div class="d-md-flex align-items-center">
        <a class="col-md-2 px-0" href="{{ url('/') }}">
            <img id="logo" src="https://i.ibb.co/w7xDgyK/watchme2.png" alt="watchme" title="Logo WatchMe"
                class="img-fluid py-3 px-3">
        </a>
        <form class="col-lg-6 col-md-4 offset-lg-1 order-1 order-md-0" action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q" placeholder="Rechercher un film"> <span
                    class="input-group-btn">
                    <button type="submit" class="btn bg-beige">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <nav class="navbar navbar-expand-md col-md-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <div class="d-flex align-items-center"><i class="fas fa-bars beige fs-30"></i>
                    <p class="beige font-weight-bold my-auto pl-2">Menu</p>
                </div>
            </button>
            <div class="collapse navbar-collapse d-md-flex justify-content-md-end" id="navbarToggler">
                <div class="navbar-nav ">
                    <a class="beige fs-15 font-weight-bold px-2" href="{{ route('catalogue') }}">Catalogue</a>
                    <a class="beige fs-15 font-weight-bold px-2" href="">Favoris</a>
                    <a class="beige fs-15 font-weight-bold px-2" href="">Compte</a>
                    <a class="px-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="beige fas fa-sign-out-alt fs-20"></i>
                    </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>

    </div>



    <br>
    {{-- Page Content --}}
    @yield('content')

    {{-- Footer --}}
    <div class="d-md-flex flex-column flex-md-row align-items-center">
        <div class="col-12 col-md-4 text-center">
            <a class="beige fs-15 px-2 font-weight-bold" href="">Mentions légales</a>
            <a class="beige fs-15 px-2 font-weight-bold" href="">Conditions d'utilisation</a>
        </div>
        <div class="col-12 col-md-4 text-center text-md-right order-md-1">
            <a href="">
                <i class="beige fs-20 fab fa-facebook-square"></i>
            </a>
            <a href="">
                <i class="beige fs-20 fab fa-twitter-square"></i>
            </a>
            <a href="">
                <i class="beige fs-20 fab fa-instagram-square"></i>
            </a>
            <a class="beige fs-15 px-2 font-weight-bold" href="">Nous contacter</a>
        </div>
        <div class="col-12 col-md-4 text-center">
            <span class="beige fs-15 font-weight-bold ">© 2020 WatchMe</span>
        </div>
    </div>

    @endguest

</body>

</html>