@extends('dashboard.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add new Course
                    <small>New Lesson</small>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <form method="POST" action="{{ url('/admin/course') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Course Name</label>
                                <input class="form-control" id="name" name="name" required>
                                <span class="help-block errorMessage">{{ empty(('name')) ? "Must be filled" : ('name') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category"
                                        required>
                                    <option disabled selected> -- Please select a Category --</option>
                                    <option value="Introductory">Introductory Courses</option>
                                    <option value="Safety">Safety</option>
                                    <option value="Security">Security</option>
                                </select>
                                <span class="help-block errorMessage">{{ empty(('category')) ? "Must be filled" : ('category') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="passPercentage">Quiz pass percentage</label>
                                <input type="number" value="50" min="50" max="100" class="form-control"
                                       id="passPercentage" name="passPercentage" required>
                                <span class="help-block errorMessage">{{ empty(('passPercentage')) ? "Must be filled" : ('passPercentage') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" rows="5" id="description"
                                          name="description" required></textarea>
                                <span class="help-block errorMessage">{{ empty(('description')) ? "Must be filled" : ('description') }}</span>
                            </div>

                            <div class="input-group">
                                <input type="submit" class="btn btn-success" value="Submit"/>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            document.title = "AusCert | Edit Courses";
        });
    </script>
@endsection