@extends('layouts.master')

@section('title'){{ 'Home' }}@stop

@section('content')
    <div class="uk-section uk-section-default">
        <div class="uk-container">
            <div class="uk-width-1-2@m uk-padding uk-align-center">
                <h1>AusCERT Online Security Training Tool</h1>
                <p>The AusCERT Online Security Training Tool is an interactive web based application that
                    provides the tools for enrolled users to take quizzes.</p>
                <a href="{{ route('login') }}" class="uk-button uk-button-primary">Start Now for Free!</a>
            </div>
        </div>
    </div>
@endsection