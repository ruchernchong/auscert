<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Cyber Security online training system for a business context."/>
    <meta name="author" content="Tartiner Studios"/>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"/>

    <title>@yield('title') | Tartiner Studios</title>

    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">

    <script>
        window.Laravel =  {!! json_encode([
    'csrfToken' => csrf_token(),
    ]); !!}
    </script>
</head>
<body>
@include('flash::message')
@include('dashboard.layouts.header')
<div id="app">
    @yield('content')
</div>
@include('dashboard.layouts.footer')
<script async src="{{ url(mix('js/app.js')) }}"></script>
</body>
</html>