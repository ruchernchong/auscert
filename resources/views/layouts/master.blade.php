<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - AusCERT (Tartiner Studios)</title>

    <link href="{{ url(mix('/css/app.css')) }}" rel="stylesheet">
    <link href="{{ url(mix('/css/style.css')) }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
</head>
<body>
@yield('content')
@include('dashboard.layouts.footer')
<script src="{{ url(mix('/js/app.js')) }}"></script>
</body>
</html>