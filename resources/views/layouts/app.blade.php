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



        @else
        {{-- Header --}}
        <div class="d-flex align-items-center">
            <a class="col-2" href="{{ url('/') }}">
                <img id="logo" src="https://i.ibb.co/tY3SpjN/watchme.png" alt="watchme" title="Logo WatchMe"
                    class="img-fluid" border="0">
            </a>
            <form class="col-6 offset-1" action="/search" method="POST" role="search">
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
            <div class="col-3 text-right">
                <a class="beige fs-20 font-weight-bold px-2" href="{{ route('catalogue') }}">Catalogue</a>
                <a class="beige fs-20 font-weight-bold px-2" href="">Favoris</a>
                <a class="beige fs-20 font-weight-bold px-2" href="">Mon Compte</a>
                <a class="px-2" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="beige fas fa-sign-out-alt fs-20"></i>
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        {{-- Page Content --}}
        @yield('content')

        {{-- Footer --}}
        <div class="d-flex align-items-center">
            <div class="col-3">
                <a class="beige fs-15 px-2 font-weight-bold" href="">Mentions légales</a>
                <a class="beige fs-15 px-2 font-weight-bold" href="">Conditions d'utilisation</a>
            </div>
            <span class="col-6 beige fs-15 font-weight-bold text-center">© 2020 WatchMe</span>
            <div class="col-3 text-right">
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
        </div>

        @endguest

</body>

</html>