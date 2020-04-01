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

        {{-- Spinner News --}}
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
                        <div id="movie{{ $new->id }}" class="col-2 float-left">
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
                <a class="carousel-control-prev justify-content-start pl-2 slide-icon" href="#newsCarousel"
                    role="button" data-slide="prev">
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




        @else
        {{-- Header --}}
        <div class="d-md-flex align-items-center">
            <a class="col-md-2 px-0" href="{{ url('/') }}">
                <img id="logo" src="https://i.ibb.co/w7xDgyK/watchme2.png" alt="watchme" title="Logo WatchMe"
                    class="img-fluid py-3 px-3">
            </a>
            <form class="col-lg-6 col-md-4 offset-lg-1 order-1 order-md-0" action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group shadow">
                    <input type="text" class="form-control" name="search" placeholder="{{ __('main.search') }}"> <span
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
                        <a class="beige fs-15 font-weight-bold px-2"
                            href="{{ route('catalogue') }}">{{ __('main.catalog') }}</a>
                        <a class="beige fs-15 font-weight-bold px-2"
                            href="{{ url('favoris') }}">{{ __('main.favorites') }}</a>
                        <a class="beige fs-15 font-weight-bold px-2"
                            href="{{ url('account') }}">{{ __('main.account') }}</a>
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
        <div class="d-md-flex flex-column flex-md-row align-items-center py-5">
            <div class="col-12 col-md-4 text-center text-md-left">
                <a class="beige fs-15 px-2 font-weight-bold" href="{{ url('/mentions') }}">{{ __('main.legal') }}</a>
                <a class="beige fs-15 px-2 font-weight-bold" href="{{ url('/cgu') }}">{{ __('main.terms') }}</a>
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
                <a class="beige fs-15 px-2 font-weight-bold" href="{{ url('/contact') }}">{{ __('main.contact') }}</a>
            </div>
            <div class="col-12 col-md-4 text-center">
                <span class="beige fs-15 font-weight-bold ">© 2020 WatchMe</span>
            </div>
        </div>
        @endguest
    </div>
</body>

</html>