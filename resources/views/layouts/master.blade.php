<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - AusCERT</title>

    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">

    <script>
        window.Laravel =  {!! json_encode([
    'csrfToken' => csrf_token(),
    ]); !!}
    </script>
</head>
<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
<script async src="{{ url(mix('js/app.js')) }}"></script>
</body>
</html>