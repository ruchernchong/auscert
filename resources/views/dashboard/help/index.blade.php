@extends('dashboard.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Help
                    <small>How to use</small>
                </h1>
                <h1>Guides</h1>
                <p>
                    Insert Content here.
                </p>
                <h1>FAQs</h1>
                <ol>
                    <li>
                        <h4>How do I gain access to this application and begin taking courses?</h4>
                        <p>
                            Simply go to
                            <a href="{{ url('') }}">{{ url('') }}</a>
                            and register an account. After verifying your email, you can immediately begin using the
                            application.
                        </p>
                    </li>
                    <li>
                        <h4>How do I attempt a course?</h4>
                        <p>
                            To attempt a course, locate and click it in the yellow “Course Progress” section of the
                            dashboard page. Courses consist of a description, followed by a number of slides to teach
                            content, and a quiz. All sections of a course are navigated to using the tabs located across
                            the top when viewing a course. A course will be moved to the “Completed Courses” section
                            once a passing grade has been achieved for the quiz.
                        </p>
                    </li>
                    <li>
                        <h4>Am I required to complete or pass all the courses assigned to me?</h4>
                        <p>
                            There will no penalties for users who failing to attempt or complete courses. However, users
                            are highly recommended to complete all of the assigned courses to have an understanding of
                            the possible cyber security threats.
                        </p>
                    </li>
                    <li>
                        <h4>Is there any deadline to complete my assigned course?</h4>
                        <p>
                            There is no deadline or time limit for the completion of any course enforced by the site.
                        </p>
                    </li>
                    <li>
                        <h4>How can I update the personal details linked to my account?</h4>
                        <p>
                            Both users and administrators can edit their personal details such as email, contact number
                            and password by clicking on the “My Account” tab.
                        </p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <script>
        $(window).ready(function () {
            document.title = "AusCert | Help";
        });
    </script>
@endsection