@extends('dashboard.layouts.master')

@section('title'){{ 'Help' }}@stop

@section('content')
    <div class="uk-section uk-section-default">
        <div class="uk-container">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><span>Help</span></li>
            </ul>

            <div class="uk-card uk-card-default">
                <div class="uk-card-header"><h3 class="uk-card-title">Help</h3></div>
                <div class="uk-card-body">
                    {{--<div class="uk-card">--}}
                    {{--<div class="uk-card-header"><h3 class="uk-card-title">Guides</h3></div>--}}
                    {{--<div class="uk-card-body">--}}
                    {{--<p>Insert content here.</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="uk-card">
                        <div class="uk-card-header">
                            <h3 class="uk-card-title">Frequently Asked Questions (FAQs)</h3>
                        </div>
                        <div class="uk-card-body">
                            <help></help>
                        </div>
                    </div>
                </div>
                <div class="uk-card-footer"></div>
            </div>
        </div>
    </div>
@endsection