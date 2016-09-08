@extends('layouts.app')

@section('content')
    {{--@if ($this->session->flashdata('denied'))--}}
        {{--<script>--}}
            {{--$.notifyBar({--}}
                {{--html: "{{ $this->session->flashdata('denied') }}",--}}
                {{--cssClass: "error",--}}
                {{--delay: 3000,--}}
                {{--clickToClose: true,--}}
                {{--animationSpeed: "normal"--}}
            {{--});--}}
        {{--</script>--}}
    {{--@endif--}}
    {{--@if ($this->session->flashdata('login-success'))--}}
        {{--<script>--}}
            {{--$.notifyBar({--}}
                {{--html: "{{ $this->session->flashdata('login-success') }}",--}}
                {{--cssClass: "success",--}}
                {{--delay: 3000,--}}
                {{--clickToClose: true,--}}
                {{--animationSpeed: "normal"--}}
            {{--});--}}
        {{--</script>--}}
    {{--@endif--}}

    <!--Modal popup for delete course-->
    <div id="courseQuizResults" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    <h3>
                        Quiz Results -
                        <b>{{ $this->session->flashdata('quiz_courseName') ?: '' }}</b>
                    </h3>
                </div>
                <div class="modal-body">
                    @if ($this->session->flashdata('pass') == 1)
                        ?>
                        <div class="alert alert-success">
                            <b>Congratulations!</b> You have passed the quiz.
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <p>
                                <b>So close!</b> You have failed the quiz.
                            </p>
                            <p>
                                You can re-attempt the quiz after reviewing the material.
                            </p>
                            <a class="btn btn-danger"
                               data-href="{{ url('/learning/') }}/{{ $this->session->flashdata('quiz_courseID') ?: '' }}">Re-attempt
                                Quiz now</a>
                            <a class="btn btn-default" data-dismiss="modal">Re-attempt Quiz later</a>
                        </div>
                    @endif
                    <ul class="list-group">
                        <li class="list-group-item">
                            Questions:&emsp;
                            <span class="badge">
                                {{ $this->session->flashdata('total_questions') }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            Correct:&emsp;
                            <span class="badge">
                                {{ $this->session->flashdata('correct_questions') }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            Score:&emsp;
                            <span class="badge">
                                {{ number_format($this->session->flashdata('correct_questions') / $this->session->flashdata('total_questions') * 100, 0) . "%" }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            Required percentage to pass:&emsp;
                            <span class="badge">
                                {{ $this->session->flashdata('required') . "%" }}
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    @if ($this->session->flashdata('pass') == 1)
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hurray!</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard
                        <small>Content Overview</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-progress">
                    <div class="panel panel-heading-progress">
                        <h3 class="panel-title">Course Progress</h3>
                    </div>

                    <div class="panel-progress body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                @if ($userCourses)
                                    <thead>
                                    <th>Status</th>
                                    <th>Course Name</th>
                                    <th>Progress</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($userCourses as $userCourse)
                                        @if ($userCourse->completion != 100 || $userCourse->completion_status == "Quiz failed")
                                            <tr data-href="{{ url('learning/' . $userCourse->courseID) }}">
                                                <td>
                                                    @if ($userCourse->completion == 100)
                                                        @if ($userCourse->completion_status == "Quiz failed")
                                                            <span class="label label-danger">Quiz Failed</span>
                                                        @else
                                                            <span class="label label-success">Completed</span>
                                                            @if ($userCourse->completion == 0)
                                                                <span class="label label-default">Not Started</span>
                                                            @elseif ($userCourse->completion < 0 || $userCourse->completion > 100)
                                                                <span class="label label-info">WTF?</span>
                                                            @else
                                                                <span class="label label-warning">In Progress</span>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($userCourse->completion_status == "Quiz failed")
                                                        <span style="color: #ff0000;">
                                                            <b>{{ $userCourse->courseName }}</b>
                                                        </span>
                                                    @else
                                                        {{ $userCourse->courseName }}
                                                    @endif
                                                </td>
                                                <td width="50%">
                                                    <div class="progress">
                                                        @if ($userCourse->completion_status == "Quiz failed")
                                                            <div style="width: {{ $userCourse->completion }}%"
                                                                 class="progress-bar progress-bar-danger progress-bar-striped">
                                                                Failed
                                                                @elseif ($userCourse->completion_status == "Not started")
                                                                    <div style="min-width: 2em;"
                                                                         class="progress-bar progress-bar-striped active">
                                                                        {{ $userCourse->completion == 0 ? '0%' : '' }}
                                                                    </div>
                                                                @else
                                                                    <div style="width: {{ $userCourse->completion }}%"
                                                                         class="progress-bar">
                                                                        {{ $userCourse->completion }}%
                                                                    </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                        <div class="form-group">
                                            <label>You do not have any course(s) enrolled.</label>
                                        </div>
                                    @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-completed">
                    <div class="panel panel-heading-completed">
                        <h3 class="panel-title">Completed Courses</h3>
                    </div>
                    <div class="panel-completed body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                @if ($completedUserCourses)
                                    <thead>
                                    <th>Course Name</th>
                                    <th><i class="fa fa-line-chart"></i>&nbsp;Mark</th>
                                    <th>Date Completed</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($completedUserCourses as $completedUserCourse)
                                        @if ($completedUserCourse->completion == 100 && $completedUserCourse->completion_status == "Completed")
                                            <tr data-href="{{ url('/learning/' . $completedUserCourse->courseID) }}">
                                                <td>
                                                    {{ $completedUserCourse->courseName ?: 'You do not have any completed course.' }}
                                                </td>
                                                <td>
                                                    <b>{{ $completedUserCourse->grading * 100 ?: '0' }}%</b>
                                                </td>
                                                <td>
                                                    {{ $completedUserCourse->date_attempt ?: '' }}
                                                </td>
                                            </tr>
                                        @else
                                            <div class="form-group" style="text-align: center;">
                                                <label>You do not have any completed course(s).</label>
                                            </div>
                                        @endif
                                    @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).ready(function () {
            document.title = "AusCert | Dashboard";

            @if ($this->session->flashdata('total_questions'))
            $('#courseQuizResults').modal('show');
            @endif

            $('[data-toggle="tooltip"]').tooltip();
            $('#pageHome').removeAttr('href');
        });
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
