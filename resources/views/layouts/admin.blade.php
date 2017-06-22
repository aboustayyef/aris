<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ARIS Admin</title>

    <!-- Styles -->
    <link href="{{ mix('css/aris_admin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
            <div class="container">

                        <img src="/img/brand/aris-admin-logo.png" width="340">
                        @if( request()->path() != 'login')
                            <a class="btn pull-right btn-danger btn-lg" href="/logout" role="button">Log Out</a>
                        @endif

            </div>

        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/aris_admin.js') }}"></script>
</body>
</html>
