@extends('dashboard.layouts.master')

@section('title'){{ 'Account Management' }}@stop

@section('content')
    <div class="uk-section uk-section-default">
        <div class="uk-container">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><span>Account Management</span></li>
            </ul>

            <div class="uk-flex uk-flex-middle" data-uk-grid>
                <div class="uk-width-expand uk-text-center">
                    <img src="{{ asset('images/user-placeholder.jpg') }}" width="128" height="128"
                         class="uk-border-circle"
                         alt="Avatar">

                    <div class="uk-margin">
                        <label class="uk-label">{{ $user->UQ_id ? 'Your UQ ID: ' . $user->UQ_id : 'You do not have a valid UQ ID' }}</label>
                        <br/>
                        <small>Member since <strong>{{ $user->created_at->format('M d, Y') }}</strong></small>
                    </div>

                    <div class="uk-margin">
                        <label>Registered Faculties and/or Groups</label>
                        <ul class="uk-list uk-list-striped  uk-text-left">
                            @foreach ($user->userGroups as $userGroup)
                                <li>{{ $userGroup->organisation }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="uk-width-2-3">
                    <form action="{{ route('accounts.edit', auth()->id()) }}" class="uk-form-horizontal">
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header"><h3 class="uk-card-title">Edit your account</h3></div>
                            <div class="uk-card-body">
                                @include('dashboard.account.partials.form')
                            </div>
                            <div class="uk-card-footer"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection