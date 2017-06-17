@extends('dashboard.layouts.master')

@section('title'){{ 'Admin' }}@stop

@section('content')
    <div class="uk-section uk-section-default">
        <div class="uk-container">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><span>Admin</span></li>
            </ul>

            <div class="uk-card uk-card-default">
                <div class="uk-card-header"><h3 class="uk-card-title"></h3></div>
                <div class="uk-card-body">
                    <a href="{{ route('courses.create') }}" class="uk-button uk-button-primary">
                        <span data-uk-icon="icon: plus"></span> New course
                    </a>

                    <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="animation: uk-animation-fade">
                        <li>
                            <a href="#"><span data-uk-icon="icon: code"></span>&emsp;Courses</a>
                        </li>
                        <li>
                            <a href="#"><span data-uk-icon="icon: user"></span>&emsp;Users</a>
                        </li>
                        <li>
                            <a href="#"><span data-uk-icon="icon: users"></span>&emsp;Groups</a>
                        </li>
                    </ul>

                    <ul class="uk-switcher uk-margin">
                        <li>@include('dashboard.admin.partials.courses')</li>
                        <li>@include('dashboard.admin.partials.members')</li>
                        <li>@include('dashboard.admin.partials.groups')</li>
                    </ul>
                </div>
                <div class="uk-card-footer"></div>
            </div>
        </div>
    </div>
    {{--<script>--}}
    {{--function deleteCourse(id) {--}}
    {{--swal({--}}
    {{--title: 'Confirm Delete',--}}
    {{--text: 'Deleting Course',--}}
    {{--type: 'warning',--}}
    {{--showCancelButton: true,--}}
    {{--confirmButtonColor: '#3085d6',--}}
    {{--confirmButtonText: 'Delete',--}}
    {{--cancelButtonColor: '#d33',--}}
    {{--cancelButtonText: 'Cancel',--}}
    {{--confirmButtonClass: 'btn btn-success',--}}
    {{--cancelButtonClass: 'btn btn-danger'--}}
    {{--}).then(function () {--}}
    {{--document.getElementById('delete-course-' + id).submit();--}}
    {{--swal(--}}
    {{--'Deleted!',--}}
    {{--'The Course has been deleted.',--}}
    {{--'success'--}}
    {{--);--}}
    {{--}, function (dismiss) {--}}
    {{--if (dismiss == 'cancel') {--}}
    {{--swal(--}}
    {{--'Canceled!',--}}
    {{--'Course was not deleted.',--}}
    {{--'error'--}}
    {{--);--}}
    {{--}--}}
    {{--});--}}
    {{--}--}}
    {{--</script>--}}
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--document.title = "AusCert | Admin";--}}
    {{--$('[data-toggle="tooltip"]').tooltip();--}}
    {{--$('#pageAdmin').removeAttr('href');--}}
    {{--var siteURL = "learning/";--}}
    {{--var imgURL = "assets/img/user-placeholder.jpg";--}}
    {{--//--}}
    {{--$('a[data-toggle="tab"]').on('shown.bs.tab', function () {--}}
    {{--var currentTab = $('.nav-tabs .active').attr('id');--}}
    {{--//--}}
    {{--if (currentTab == "upperTabMembers") {--}}
    {{--$("#searchBtn").show();--}}
    {{--$(".dynamicSearchBar").attr("id", "userSearchBar").show();--}}
    {{--$(".dynamicSearchBar").attr("placeholder", "Search Users");--}}
    {{--searchUser();--}}
    {{--} else if (currentTab == "upperTabCourses") {--}}
    {{--$("#searchBtn").show();--}}
    {{--$(".dynamicSearchBar").attr("id", "courseSearchBar").show();--}}
    {{--$(".dynamicSearchBar").attr("placeholder", "Search Courses");--}}
    {{--searchCourse();--}}
    {{--} else if (currentTab == "upperTabGroups") {--}}
    {{--$(".dynamicSearchBar").hide();--}}
    {{--$("#searchBtn").hide();--}}
    {{--}--}}
    {{--});--}}

    {{--$(document).on('keyup', '#userSearchBar', function () {--}}
    {{--searchUser();--}}
    {{--});--}}

    {{--$(document).on('keyup', '#courseSearchBar', function () {--}}
    {{--searchCourse()--}}
    {{--});--}}

    {{--function searchUser() {--}}
    {{--if ($("#userSearchBar").val().length >= 0) {--}}
    {{--$.ajax({--}}
    {{--type: "post",--}}
    {{--global: false,--}}
    {{--url: "{{ url('admin/searchUser') }}",--}}
    {{--cache: false,--}}
    {{--data: 'userSearch=' + $('#userSearchBar').val(),--}}
    {{--success: function (response) {--}}
    {{--$("#users_results").html("");--}}

    {{--var obj = JSON.parse(response);--}}
    {{--if (!obj.noResult) {--}}
    {{--$("#users_results").html(obj.html);--}}
    {{--} else {--}}
    {{--$("#users_results").html("<h5>No Users Found</h5>");--}}
    {{--}--}}
    {{--},--}}
    {{--error: function (error) {--}}
    {{--console.log(error);--}}
    {{--}--}}
    {{--});--}}
    {{--}--}}
    {{--return false;--}}
    {{--}--}}

    {{--function searchCourse() {--}}
    {{--if ($("#courseSearchBar").val().length >= 0) {--}}
    {{--$.ajax({--}}
    {{--type: "post",--}}
    {{--global: false,--}}
    {{--url: "{{ url('admin/searchCourse') }}",--}}
    {{--cache: false,--}}
    {{--data: 'courseSearch=' + $('#courseSearchBar').val(),--}}
    {{--success: function (response) {--}}
    {{--$("#users_results").html("");--}}

    {{--var--}}
    {{--obj = JSON.parse(response);--}}
    {{--if (!obj.noResult) {--}}
    {{--$("#courses_results").html(obj.html);--}}
    {{--}--}}
    {{--else {--}}
    {{--$("#courses_results").html("<h5>No Courses Found</h5>");--}}
    {{--}--}}
    {{--},--}}
    {{--error: function (error) {--}}
    {{--console.log(error);--}}
    {{--}--}}
    {{--});--}}
    {{--}--}}

    {{--return false;--}}
    {{--}--}}
    {{--});--}}
    {{--</script>--}}
@endsection