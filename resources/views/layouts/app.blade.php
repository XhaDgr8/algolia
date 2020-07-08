<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <uses-permission android:name="android.permission.INTERNET" />--}}
    {{-- <uses-permission android:name="android.permission.ACCESS_NETWORK_STATE" />--}}

    <title>{{ config('app.name', 'Dev29') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="bg-light">
    <div id="app">
        @include('inc.navbar')
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
