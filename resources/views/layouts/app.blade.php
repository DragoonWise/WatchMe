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
        <div class="d-flex">
            <a href="{{ url('/') }}">
                <img id="logo" src="https://i.ibb.co/tY3SpjN/watchme.png" alt="watchme" title="Logo WatchMe"
                    class="img-fluid offset-1" border="0">
            </a>
            <i class="beige fas fa-sign-out-alt"></i>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @endguest

</body>

</html>