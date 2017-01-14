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
                <img src="{{ url('/img/uq_logo.png') }}" class="uq-logo" alt="UQ Logo">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="v-divider">
                    <img src="{{ url('/img/logo.png') }}" class="auscert-logo" alt="AusCert Logo">
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a id="pageHome" href="{{ url('/dashboard') }}">
                        <i class="fa fa-home"></i>&emsp;Home
                    </a>
                </li>
                @can('admin')
                    <li>
                        <a id="pageAdmin" href="{{ url('/admin') }}">
                            <i class="fa fa-folder-open"></i>&emsp;Admin
                        </a>
                    </li>
                @endcan
                <li>
                    <a id="pageAccount" href="{{ url('/dashboard/account') }}">
                        <i class="fa fa-user"></i>&emsp;Account
                    </a>
                </li>
                <li>
                    <a id="pageHelp" href="{{ url('/dashboard/help') }}">
                        <i class="fa fa-question"></i>&emsp;Help
                    </a>
                </li>
                <li>
                    <a id="pageLogout"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       href="{{ url('/logout') }}">
                        <i class="fa fa-power-off"></i>&emsp;Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>