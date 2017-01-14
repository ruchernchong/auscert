@extends('layouts.master')

@section('content')
    <form method="POST" id="formLogin" class="formLogin" name="formLogin" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="content">
            <div class="title">Login</div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password"
                           required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
            </div>
            <button>Login</button>
            <div class="social">
                <span>Trouble Signing in?</span>
            </div>
            <div class="not-already">
                <p>
                    Do not have an account? <a href="{{ url('/register') }}">Register</a>
                </p>
            </div>
            <div class="forget-password">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </div>
            <div class="resend-activation">
                <p>
                    Did not receive your activation email? <a href="#">Resend Activation Email</a>
                </p>
            </div>
        </div>
    </form>
    <script>
        $(window).ready(function (e) {
            document.title = "AusCert | Login";
        });
    </script>
@endsection
