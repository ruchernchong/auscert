@extends('layouts.master')

@section('title'){{ 'Login' }}@stop

@section('content')
    <div class="uk-section uk-section-default">
        <div class="uk-container">
            @if(count($errors) > 0)
                <div class="uk-alert uk-alert-danger">
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif
            <form class="uk-form-horizontal" method="POST"
                  action="{{ action('Auth\LoginController@login') }}">
                {{ csrf_field() }}

                <div class="uk-child-width-1-2@m uk-flex uk-flex-center uk-flex-middle">
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header"><h3 class="uk-card-title">Login</h3></div>
                            <div class="uk-card-body">
                                <div class="uk-margin">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon" data-uk-icon="icon: mail"></span>
                                        <input type="email" name="email" class="uk-input uk-form-width-large" id="email"
                                               placeholder="Email address"
                                               value="{{ old('email') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <div class="uk-inline-clip">
                                        <span class="uk-form-icon" data-uk-icon="icon: lock"></span>
                                        <input type="password" name="password" class="uk-input uk-form-width-large"
                                               id="password"
                                               placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary">Login</button>
                                </div>
                            </div>
                            <div class="uk-card-footer">
                                <div class="uk-width-1-1">
                                    <div class="uk-margin">
                                        <a class="uk-button uk-button-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?</a>
                                    </div>
                                    <div class="uk-margin">
                                        Did not receive your activation email? <a>Resend Activation Email</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
