<nav class="uk-navbar-container" data-uk-navbar {{ Route::is('index') ? 'data-uk-sticky' : '' }} >
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo">Tartiner Studios</a>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li><a href="{{ route('index') }}">Home</a></li>
        </ul>
    </div>
</nav>