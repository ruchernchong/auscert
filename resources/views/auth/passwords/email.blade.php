@extends('layouts.master')

@section('title'){{ 'Forgotten password' }}@stop

@section('content')
    <div class="uk-section uk-section-default">
        <div class="uk-container">
            @if (session('status'))
                <div class="uk-alert uk-alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="uk-alert uk-alert-danger">
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="uk-child-width-1-2@m uk-flex uk-flex-center">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header"><h3 class="uk-card-title">Reset password</h3></div>
                        <div class="uk-card-body">
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" data-uk-icon="icon: mail"></span>
                                    <input type="email" name="email" id="email" class="uk-input uk-form-width-large"
                                           placeholder="Email Address"
                                           value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-footer">
                            <div class="uk-margin">
                                <button type="submit" class="uk-button uk-button-primary uk-form-width-large">
                                    Send Password Reset Link
                                </button>
                            </div>
                            <a href="{{ route('login') }}">Back to Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection