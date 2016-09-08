{{--<nav class="navbar navbar-default navbar-static-top">--}}
{{--<div class="container">--}}
{{--<div class="navbar-header">--}}

{{--<!-- Collapsed Hamburger -->--}}
{{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
{{--data-target="#app-navbar-collapse">--}}
{{--<span class="sr-only">Toggle Navigation</span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}

{{--<!-- Branding Image -->--}}
{{--<a class="navbar-brand" href="{{ url('/') }}">--}}
{{--{{ config('app.name', 'Laravel') }}--}}
{{--</a>--}}
{{--</div>--}}

{{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
{{--<!-- Left Side Of Navbar -->--}}
{{--<ul class="nav navbar-nav">--}}
{{--&nbsp;--}}
{{--</ul>--}}

{{--<!-- Right Side Of Navbar -->--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<!-- Authentication Links -->--}}
{{--@@if (Auth::guest())--}}
{{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
{{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
{{--@else--}}
{{--<li class="dropdown">--}}
{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
{{--{{ Auth::user()->name }} <span class="caret"></span>--}}
{{--</a>--}}

{{--<ul class="dropdown-menu" role="menu">--}}
{{--<li>--}}
{{--<a href="{{ url('/logout') }}"--}}
{{--onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();">--}}
{{--Logout--}}
{{--</a>--}}

{{--<form id="logout-form" action="{{ url('/logout') }}" method="POST"--}}
{{--style="display: none;">--}}
{{--{{ csrf_field() }}--}}
{{--</form>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--@end@if--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                <img src="{{ url('assets/img/uq_logo.png') }}" class="uq-logo" alt="UQ Logo">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="v-divider">
                    <img src="{{ url('assets/img/logo.png') }}" class="auscert-logo" alt="AusCert Logo">
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a id="pageHome" href="{{ url('/home') }}">
                        <i class="fa fa-fw fa-home"></i>&nbsp;Home
                    </a>
                </li>
{{--                @if ($user->type == "admin")--}}
                    <li>
                        <a id="pageAdmin" href="{{ url('/admin') }}">
                            <i class="fa fa-fw fa-folder-open"></i>&nbsp;Admin
                        </a>
                    </li>
                {{--@endif--}}
                <li>
                    <a id="pageAccount" href="{{ url('/account') }}">
                        <i class="fa fa-fw fa-gear"></i>&nbsp;My Account
                    </a>
                </li>
                <li>
                    <a id="pageHelp" href="{{ url('/help') }}">
                        <i class="fa fa-fw fa-question"></i>&nbsp;Help
                    </a>
                </li>
                <li>
                    <a id="pageLogout" href="{{ url('/logout') }}">
                        <i class="fa fa-fw fa-power-off"></i>&nbsp;Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>