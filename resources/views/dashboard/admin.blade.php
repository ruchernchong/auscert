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

    <!--Modal popup for delete course-->
    <div id="adminModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    <h4></h4>
                </div>
                <div class="modal-body">
                    <h5></h5>
                    <h8 id="delName"></h8>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-success yesConfirm">Yes</a>
                    <a type="button" class="btn btn-danger noConfirm" data-dismiss="modal">No</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin Page</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <a href="{{ url('/admin/course/create') }}" class="btn btn-primary">Create new course</a>&emsp;
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input type="search" placeholder="Search Courses" class="form-control dynamicSearchBar"
                                   id="courseSearchBar">
                            <span id="searchBtn" class="input-group-btn">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="clients-list">
                    <ul class="nav nav-tabs">
                        <li id="upperTabCourses" class="active">
                            <a id="courseTopTab" data-toggle="tab" href="#tab-courses"><i class="fa fa-briefcase"></i>&emsp;Courses</a>
                        </li>
                        <li id="upperTabMembers">
                            <a id="userTopTab" data-toggle="tab" href="#tab-members"><i class="fa fa-user"></i>&emsp;Users</a>
                        </li>
                        <li id="upperTabGroups">
                            <a id="groupTopTab" data-toggle="tab" href="#tab-groups"><i class="fa fa-users"></i>&emsp;Groups</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-courses" class="tab-pane fade in active">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <th>Course List
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <tbody id="courses_results">
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>
                                                <a href="{{ url('/learning/' . $course->id) }}">{{ $course->name }}</a>
                                            </td>
                                            <td>{{ date_format($course->created_at, 'd M Y, H:i') }}</td>
                                            <td>{{ date_format($course->updated_at, 'd M Y, H:i') }}</td>
                                            <td>
                                                @if ($course->active == 1)
                                                    <div class="btn btn-sm btn-default">
                                                        <input type="checkbox"
                                                               id="activeChecked_{{ $course->id }}"
                                                               class="courseActive" checked>
                                                        <label for="activeChecked_{{ $course->id }}"
                                                               class="activeLabel">Active</label>
                                                    </div>
                                                @else
                                                    <div class="btn btn-sm btn-default">
                                                        <input type="checkbox"
                                                               id="activeNotChecked_{{ $course->id }}"
                                                               class="courseActive">
                                                        <label for="activeNotChecked_{{ $course->id }}"
                                                               class="activeLabel">Active</label>
                                                    </div>
                                                @endif
                                            </td>

                                            <td class="project-actions">
                                                <a href="{{ url('/admin/course/' . $course->id . '/edit') }}"
                                                   class="btn btn-sm btn-success">
                                                    <i class="fa fa-pencil"></i>&emsp;Edit
                                                </a>
                                                &nbsp;
                                                <a href="{{ url('/admin/course/' . $course->id . '/analysis') }}"
                                                   class="btn btn-sm btn-primary">
                                                    <i class="fa fa-bar-chart-o"></i>&emsp;Course Analytics
                                                </a>
                                                &nbsp;
                                                <a href="{{ url('/admin/course/' . $course->id) }}" rel="tooltip"
                                                   class="btn btn-sm btn-danger"
                                                   onclick="event.preventDefault(); deleteCourse({{ $course->id }});"
                                                   data-original-title="Delete Course"><i class="fa fa-trash"></i></a>
                                                <form id="delete-course-{{ $course->id }}" method="POST"
                                                      action="{{ url('/admin/course/' . $course->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="tab-members" class="tab-pane fade">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Groups</th>
                                        <th>Email Address</th>
                                        <th>Contact No.</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                <span>{{ $user->first_name . ' ' . $user->last_name }}</span>
                                            </td>
                                            <td>
                                                @if (count($user->userGroups) > 0)
                                                    @foreach ($user->userGroups as $userGroup)
                                                        <ul>
                                                            <li>
                                                                <a href="#">{{ $userGroup->organisation }}</a>
                                                            </li>
                                                        </ul>
                                                    @endforeach
                                                @else
                                                    <ul>
                                                        <li>No Groups</li>
                                                    </ul>
                                                @endif
                                            </td>
                                            <td>
                                                <i class="fa fa-envelope"></i>&emsp;<a
                                                        href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                            </td>
                                            <td>
                                                <i class="fa fa-phone"></i>&emsp;<a
                                                        href="tel:{{ $user->contact }}">{{ $user->contact }}</a>
                                            </td>
                                            <td>
                                                {{ ucwords($user->type) }}
                                            </td>
                                            <td class="user-actions">
                                                <a href="{{ url('manage_usercourse/' . $user['userID']) }}"
                                                   class="btn btn-sm btn-success">
                                                    <i class="fa fa-pencil"></i>&emsp;Manage Courses
                                                </a>
                                                &nbsp;
                                                <a href="{{ url('manage_usergroup/' . $user['userID']) }}"
                                                   class="btn btn-sm btn-primary">
                                                    <i class="fa fa-bar-chart-o"></i>&emsp;Manage Groups
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div id="tab-groups" class="tab-pane fade">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>Group Name</th>
                                        <th>Total Members</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach ($groups as $group)
                                        <tr>
                                            <td>{{ $group->organisation }}</td>
                                            <td>{{ sizeof($group->userGroups) }}</td>
                                            <td>
                                                <a href="{{ url('manage_member/' . $group->group_id) }}"
                                                   class="btn btn-sm btn-success"><i class="fa fa-signal"></i>&emsp;Manage
                                                    Members</a>
                                                &nbsp;
                                                <a href="{{ url('manage_course/' . $group->group_id) }}"
                                                   class="btn btn-sm btn-primary"><i class="fa fa-refresh fa-spin"></i>&emsp;Manage
                                                    Courses</a>
                                                &nbsp;
                                                <a data-toggle="modal" data-target="#adminModal"
                                                   class="groupDelBtn btn btn-sm btn-danger"
                                                   data-delName="{{ $group->organisation }}"
                                                   data-delUrl="{{ url('admin/dropGroup/' . $group->group_id) }}"><i
                                                            class="fa fa-trash"></i></a>
                                                &nbsp;
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('/js/main.js') }}"></script>
    <script>
        function deleteCourse(id) {
            swal({
                title: 'Confirm Delete',
                text: 'Deleting Course',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Delete',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger'
            }).then(function () {
                document.getElementById('delete-course-' + id).submit();
                swal(
                    'Deleted!',
                    'The Course has been deleted.',
                    'success'
                );
            }, function (dismiss) {
                if (dismiss == 'cancel') {
                    swal(
                        'Canceled!',
                        'Course was not deleted.',
                        'error'
                    );
                }
            });
        }
    </script>
    <script>
        $(function () {
            // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
            $('a[data-toggle="tab"]').on('click', function (e) {
                console.log($(this).attr('href'));
                // save the latest tab; use cookies if you like 'em better:
                localStorage.setItem('lastTab', $(this).attr('href'));
            });

            // go to the latest tab, if it exists:
            var lastTab = localStorage.getItem('lastTab');
            console.log(lastTab);
            if (lastTab) {
                $('a[href="' + lastTab + '"]').click();
            }
        });
    </script>
    <script>
        $(window).ready(function () {
            document.title = "AusCert | Admin";
            $('[data-toggle="tooltip"]').tooltip();
            $('#pageAdmin').removeAttr('href');
            var siteURL = "learning/";
            var imgURL = "assets/img/user-placeholder.jpg";
//
            $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
                var currentTab = $('.nav-tabs .active').attr('id');
//
                if (currentTab == "upperTabMembers") {
                    $("#searchBtn").show();
                    $(".dynamicSearchBar").attr("id", "userSearchBar").show();
                    $(".dynamicSearchBar").attr("placeholder", "Search Users");
                    searchUser();
                } else if (currentTab == "upperTabCourses") {
                    $("#searchBtn").show();
                    $(".dynamicSearchBar").attr("id", "courseSearchBar").show();
                    $(".dynamicSearchBar").attr("placeholder", "Search Courses");
                    searchCourse();
                } else if (currentTab == "upperTabGroups") {
                    $(".dynamicSearchBar").hide();
                    $("#searchBtn").hide();
                }
            });

            $(document).on('keyup', '#userSearchBar', function () {
                searchUser();
            });

            $(document).on('keyup', '#courseSearchBar', function () {
                searchCourse()
            });

            function searchUser() {
                if ($("#userSearchBar").val().length >= 0) {
                    $.ajax({
                        type: "post",
                        global: false,
                        url: "{{ url('admin/searchUser') }}",
                        cache: false,
                        data: 'userSearch=' + $('#userSearchBar').val(),
                        success: function (response) {
                            $("#users_results").html("");

                            var obj = JSON.parse(response);
                            if (!obj.noResult) {
                                $("#users_results").html(obj.html);
                            } else {
                                $("#users_results").html("<h5>No Users Found</h5>");
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
                return false;
            }

            function searchCourse() {
                if ($("#courseSearchBar").val().length >= 0) {
                    $.ajax({
                        type: "post",
                        global: false,
                        url: "{{ url('admin/searchCourse') }}",
                        cache: false,
                        data: 'courseSearch=' + $('#courseSearchBar').val(),
                        success: function (response) {
                            $("#users_results").html("");

                            var
                                obj = JSON.parse(response);
                            if (!obj.noResult) {
                                $("#courses_results").html(obj.html);
                            }
                            else {
                                $("#courses_results").html("<h5>No Courses Found</h5>");
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }

                return false;
            }
        });
    </script>
@endsection