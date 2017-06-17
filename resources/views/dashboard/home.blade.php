@extends('dashboard.layouts.master')

@section('title'){{ 'Dashboard' }}@stop

@section('content')
    <!--Modal popup for delete course-->
    {{--@include('dashboard.quiz-result')--}}
    <div class="uk-section uk-section-default">
        <div class="uk-container">
            <ul class="uk-breadcrumb">
                <li><span>Dashboard</span></li>
                <li><span>Overview</span></li>
            </ul>

            <div class="uk-child-width-1-2 uk-flex uk-flex-center uk-flex-middle uk-grid-match"
                 data-uk-grid>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header panel-heading-progress"><h3 class="uk-card-title">Course
                                Progress</h3>
                        </div>
                        <div class="uk-card-body">
                            <div class="uk-overflow-auto">
                                <table class="uk-table uk-table-divider uk-table-hover">
                                    <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Course Name</th>
                                        <th>Progress</th>
                                    </tr>
                                    </thead>
                                    @if (count($userCourses) > 0)
                                        @foreach ($userCourses as $userCourse)
                                            @if ($userCourse->completion != 100 || $userCourse->status === 'Failed')
                                                <tr data-href="{{ url('learning/' . $userCourse->course_id) }}">
                                                    <td>
                                                        @if ($userCourse->completion === 100)
                                                            @if ($userCourse->status === 'Failed')

                                                                <label class="uk-label uk-label-danger">Quiz
                                                                    Failed</label>
                                                            @else
                                                                <label class="uk-label uk-label-success">Completed</label>
                                                            @endif
                                                        @else
                                                            @if ($userCourse->completion === 0)
                                                                <label class="uk-label">Not Started</label>
                                                            @elseif ($userCourse->completion < 0 || $userCourse->completion > 100)
                                                                <label class="uk-label">WTF?</label>
                                                            @else
                                                                <label class="uk-label uk-label-warning">In
                                                                    Progress</label>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($userCourse->status === 'Failed')
                                                            <strong>{{ $userCourse->name }}</strong>
                                                        @else
                                                            {{ $userCourse->name }}
                                                        @endif
                                                    </td>
                                                    <td width="50%">
                                                        @if ($userCourse->status === 'Failed')
                                                            <progress class="uk-progress"
                                                                      value="{{ $userCourse->completion }}"
                                                                      max="100"></progress>
                                                        @elseif ($userCourse->status === 'Not Started')
                                                            <progress class="uk-progress"
                                                                      value="{{ $userCourse->completion }}"
                                                                      max="100"></progress>
                                                        @else
                                                            <progress class="uk-progress"
                                                                      value="{{ $userCourse->completion }}"
                                                                      max="100"></progress>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr class="uk-text-center">
                                            <td colspan="3"><strong>You do not have any course(s) enrolled.</strong>
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header"><h3 class="uk-card-title">Completed Courses</h3></div>
                        <div class="uk-card-body">
                            <div class="uk-overflow-auto">
                                <table class="uk-table uk-table-striped uk-table-hover">
                                    <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Mark</th>
                                        <th>Date Completed</th>
                                    </tr>
                                    </thead>
                                    @if (count($completedUserCourses) > 0)
                                        @foreach ($completedUserCourses as $completedUserCourse)
                                            @if ($completedUserCourse->completion === 100 && $completedUserCourse->status === 'Completed')
                                                <tr data-href="{{ url('/learning/' . $completedUserCourse->course_id) }}">
                                                    <td>
                                                        {{ $completedUserCourse->name ?? 'You do not have any completed course.' }}
                                                    </td>
                                                    <td>
                                                        <b>{{ $completedUserCourse->grading * 100 ?? '0' }}%</b>
                                                    </td>
                                                    <td>
                                                        {{ $completedUserCourse->created_at ?? '' }}
                                                    </td>
                                                </tr>
                                            @else
                                                <tr class="uk-text-center">
                                                    <td colspan="3">
                                                        <strong>You do not have any completed course(s).</strong>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr class="uk-text-center">
                                            <td colspan="3"><strong>You do not have any completed course(s).</strong>
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
