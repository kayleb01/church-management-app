<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Daimond Masjid') }}</title>

   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/skin-red-light.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>
</head>
<body class="skin-red-light sidebar-mini">
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center shadow rounded">
                    <div class="col-md-8 rounded" style="background-color:#fff;">
                        <Login></Login>
                    </div>
                </div>
            </div>
        </main>
    </div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
