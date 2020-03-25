<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>WatchMe Admin</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @stack('css')
    </head>
    <body class="container-fluid">
        <header class="row">
            <div class="col-2">
                <img src="https://i.ibb.co/tY3SpjN/watchme.png"
                alt="watchme" title="Logo WatchMe" class="img-fluid" border="0">
            </div>
            <div class="col-8">
            <a href="{{ url('/admin') }}">DashBoard</a>
            <a href="{{ url('/admin/users') }}">@lang('admin.usersmanagement')</a>
        </div>
        <div class="col-2">
            <a href="{{ url('/') }}" class="btn btn-primary">Retour au site</a>
        </div>
        </header>
        @yield('content')
        @stack('scripts')
    </body>
</html>
