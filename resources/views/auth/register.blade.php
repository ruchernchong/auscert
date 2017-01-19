@extends('layouts.master')

@section('title', 'Register')

@section('content')
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 text-center">
                    <h1 class="page-header">Register</h1>
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" placeholder="Name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" placeholder="E-Mail Address" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" placeholder="Confirm Password" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
