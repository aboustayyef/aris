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

    {{-- Analytics --}}
    <script src="/js/aris_main.95382d7ec283220d3674.js"></script>
    <!-- Analytics -->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-61584501-1', 'auto');
      ga('send', 'pageview');

    </script>

    <!-- Scripts -->
    <script src="{{ mix('js/aris_admin.js') }}"></script>
</body>
</html>
