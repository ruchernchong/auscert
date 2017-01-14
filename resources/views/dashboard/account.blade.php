@extends('dashboard.layouts.master')

@section('content')
    <script>
        $(document).ajaxStart(function () {
            $("#loader").addClass("loader");
            $(".loader").fadeIn("slow");
        });

        $(document).ajaxStop(function () {
            $(".loader").fadeOut("slow");
        });
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">My Account
                    <small>Account Management</small>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7" style="border-right: 1px solid #000;">
                <div class="col-lg-5" style="text-align: center;">
                    <img class="img-circle" src="{{ url('/img/user-placeholder.jpg') }}" alt="Display Profile">
                    <div class="UQID">
                        <label>
                            <span class="label label-default">
                                {{ empty($user->UQ_id) ? 'You do not have a valid UQ ID' : 'Your UQ ID: ' . $user->UQ_id }}
                            </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Registered Faculties and/or Groups:&emsp;</label>
                        <div class="list-group">
                            @foreach ($user->userGroups as $userGroup)
                                <a class="list-group-item">
                                    {{ $userGroup->organisation }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="registeredEmail">Registered Email:&emsp;</label>
                        <div class="input-group">
                            <input type="email" id="registeredEmail" name="registeredEmail" class="form-control"
                                   value="{{ $user->email }}" readonly>
                            <span class="input-group-btn">
                                <button type="button" id="btnChangeEmail" class="btn btn-primary" value="Change Email">
                                    Change Email
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registeredName">Registered Name:&emsp;</label>
                        <div class="input-group">
                            <input type="text" id="registeredName" name="registeredName" class="form-control"
                                   value="{{ $user->first_name . ' ' . $user->last_name }}" readonly>
                            <span class="input-group-btn">
                                <button type="button" id="btnChangeName" class="btn btn-primary" value="Change Name">
                                    Change Name
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registeredPassword">Change Password:&emsp;</label>
                        <div class="input-group">
                            <input type="password" id="registeredPassword" name="registeredPassword"
                                   class="form-control" value="********" readonly>
                            <span class="input-group-btn">
                                <button type="button" id="btnChangePassword" class="btn btn-primary"
                                        value="Change Password">Change Password
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registeredContact">Registered Contact No:&emsp;</label>
                        <div class="input-group">
                            <input type="text" id="registeredContact" name="registeredContact" class="form-control"
                                   value="{{$user->contact }}"
                                   readonly>
                            <span class="input-group-btn">
                                <button type="button" id="btnChangeContact" class="btn btn-primary"
                                        value="Change Contact No.">Change Contact No.
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" id="changeEmailForm" style="display: none;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Change Email
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="CurrentEmail">Current Email:&emsp;</label>
                                <input type="email" id="CurrentEmail" name="CurrentEmail" class="form-control"
                                       value="{{$user->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">New Email:&emsp;</label>
                                <input type="email" id="formNewEmail" name="formNewEmail" class="form-control"
                                       placeholder="New Email" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" id="changeContactNoForm" style="display: none;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Change Contact No
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="formNewContactNo">New Contact No:&emsp;</label>
                                <input type="text" id="formNewContactNo" name="formNewContactNo" class="form-control"
                                       placeholder="New Contact No" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" id="changePasswordForm" style="display: none;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Change Password
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="formCurrentPassword">Current Password:&emsp;</label>
                                <input type="password" id="formCurrentPassword" name="formCurrentPassword"
                                       class="form-control" placeholder="Enter Current Password">
                            </div>
                            <div class="form-group">
                                <label for="formNewPassword">New Password:&emsp;</label>
                                <input type="password" id="formNewPassword" name="formNewPassword" class="form-control"
                                       placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <label for="formNewConfirmPassword">New Password:&emsp;</label>
                                <input type="password" id="formNewConfirmPassword" name="formNewConfirmPassword"
                                       class="form-control" placeholder="New Confirm Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function () {
            document.title = "AusCert | Account Management";

            $("#changeEmailForm").css("display", "none");

            $('[data-toggle="tooltip"]').tooltip();
            $('#pageAccount').parent('li').addClass('active');
//            $('#pageAccount').removeAttr('href');
        });

        /**
         * Hardcoded for now. Will change to dynamic later
         * @author Ru Chern
         */
        $("#btnChangeEmail").click(function (e) {
            $("#changeContactNoForm").css("display", "none");
            $("#changePasswordForm").css("display", "none");
            $("#changeEmailForm").toggle();
        });

        $("#btnChangeContact").click(function (e) {
            $("#changeEmailForm").css("display", "none");
            $("#changePasswordForm").css("display", "none");
            $("#changeContactNoForm").toggle();
        });

        $("#btnChangePassword").click(function (e) {
            $("#changeEmailForm").css("display", "none");
            $("#changeContactNoForm").css("display", "none");
            $("#changePasswordForm").toggle();
        });
    </script>
@endsection