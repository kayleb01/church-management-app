<!DOCTYPE html>
<html>
<head>
    <title>Laraspace - Laravel Admin</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <script src="{{asset('/js/core/pace.js')}}"></script>
    <link href="{{ mix('/css/laraspace.css') }}" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('admin.layouts.partials.favicons')
    @yield('styles')
</head>
<body class="layout-default skin-default">
    @include('_partials.laraspace-notifs')

    <div id="app" class="site-wrapper">
        @include('_partials.header')
        <div class="mobile-menu-overlay"></div>
        @include('_partials.sidebar',['type' => 'default'])

        @yield('content')

        @include('_partials.footer')
        
    </div>

    <script src="{{mix('/js/core/plugins.js')}}"></script>
    <script src="{{asset('/js/demo/skintools.js')}}"></script>
    <script src="{{mix('/js/core/app.js')}}"></script>
    @yield('scripts')
</body>
</html>
