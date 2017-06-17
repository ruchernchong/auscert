<nav class="uk-navbar-container uk-light" style="background-color: purple" data-uk-navbar data-uk-sticky>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo">
            <img src="{{ asset('images/uq_logo.png') }}" alt="Logo of University of Queensland">
        </a>
        <a class="uk-navbar-item uk-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo of AusCERT">
        </a>
    </div>

    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li class="{{ Route::is('dashboard') ? 'uk-active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <span data-uk-icon="icon: home"></span>&emsp;Home
                </a>
            </li>
            @can('admin')
                <li class="{{ Route::is('admin.*') ? 'uk-active' : '' }}">
                    <a href="{{ route('admin.index') }}">
                        <span data-uk-icon="icon: folder"></span>&emsp;Admin
                    </a>
                </li>
            @endcan
            <li>
                <a href="{{ route('accounts.index') }}">
                    <span data-uk-icon="icon: user"></span>&emsp;Account
                </a>
            </li>
            <li class="{{ Route::is('help.*') ? 'uk-active' : '' }}">
                <a href="{{ route('help.index') }}">
                    <span data-uk-icon="icon: question"></span>&emsp;Help
                </a>
            </li>
            <li>
                <a href="{{ url('/logout') }}" class="uk-text-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span data-uk-icon="icon: unlock"></span>&emsp;Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>