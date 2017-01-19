{{--<!DOCTYPE html>--}}
{{--<html lang="en" xmlns="http://www.w3.org/1999/html">--}}
{{--<head>--}}
{{--<meta charset="utf-8">--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge"/>--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1"/>--}}
{{--<meta name="description" content="Cyber Security online training system for a business context."/>--}}
{{--<meta name="author" content="Tartiner Studios"/>--}}
{{--<link rel="shortcut icon" href="{{ url('/img/favicon.png') }}"/>--}}

{{--<title>AusCert | Tartiner Studios</title>--}}

{{--<link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet"/>--}}
{{--<link href="{{ url('/css/sb-admin.css') }}" rel="stylesheet"/>--}}
{{--<link href="{{ url('/css/sb-admin-rtl.css') }}" rel="stylesheet"/>--}}
{{--<link href="{{ url('/css/quiz.css') }}" rel="stylesheet"/>--}}
{{--<link href="{{ url('/css/jquery-ui.min.css') }}" rel="stylesheet"/>--}}
{{--<link href="{{ url('/css/email.css') }}" rel="stylesheet"/>--}}
{{--<link href="{{ url('/css/font-awesome.min.css') }}" rel="stylesheet"/>--}}
{{--<link href="{{ url('/css/course.css') }}" rel="stylesheet"/>--}}
{{--<link href="{{ url('/css/jquery.notifyBar.css') }}" rel="stylesheet"/>--}}

{{--<script src="{{ url('/js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ url('/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ url('/ckeditor/ckeditor.js') }}"></script>--}}
{{--<script src="{{ url('/ckeditor/adapters/jquery.js') }}"></script>--}}
{{--<script src="{{ url('/js/quiz.js') }}"></script>--}}
{{--<script src="{{ url('/js/jquery-ui.min.js') }}"></script>--}}
{{--<script src="{{ url('/js/course.js') }}"></script>--}}
{{--<script src="{{ url('/js/jquery.notifyBar.js') }}"></script>--}}
{{--</head>--}}

        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AusCERT (Tartiner Studios) | @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ url('/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('/vendor/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ url('/vendor/device-mockups/device-mockups.min.css') }}">

    <!-- Theme CSS -->
    <link href="{{ url('/css/new-age.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'"></script>
    <![endif]-->
    <script src="{{ url('/js/jquery.min.js') }}"></script>
</head>
<body>
<div id="loader"></div>
<script>
    $(window).on('load', function () {
        // Animate loader off screen
        $(".loader").fadeOut("slow");
    });
</script>
@yield('content')

@include('dashboard.layouts.footer')
<!-- Scripts -->
{{--<script src="{{ url('/js/app.js') }}"></script>--}}
</body>
</html>