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

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{--<link href="{{ asset('/css/custom.css') }}" rel="stylesheet"/>--}}
    {{--<link href="{{ asset('/css/quiz.css') }}" rel="stylesheet"/>--}}
    {{--<link href="{{ asset('/css/jquery-ui.min.css') }}" rel="stylesheet"/>--}}
    {{--<link href="{{ asset('/css/email.css') }}" rel="stylesheet"/>--}}
    {{--<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet"/>--}}
    {{--<link href="{{ asset('/css/course.css') }}" rel="stylesheet"/>--}}
    {{--<link href="{{ asset('/css/jquery.notifyBar.css') }}" rel="stylesheet"/>--}}
    {{--<link href="{{ asset('/css/sweetalert2.min.css') }}" rel=" stylesheet"/>--}}
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
<script async src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>--}}
{{--<script src="{{ asset('/ckeditor/adapters/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('/js/quiz.js') }}"></script>--}}
{{--<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>--}}
{{--<script src="{{ asset('/js/course.js') }}"></script>--}}
{{--<script src="{{ asset('/js/jquery.notifyBar.js') }}"></script>--}}
{{--<script src="{{ asset('/js/sweetalert2.min.js') }}"></script>--}}
</body>
</html>