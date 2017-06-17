<div id="courseQuizResults" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h3>
                    Quiz Results -
                    {{--                        <b>{{ $this->session->flashdata('quiz_name') ?: '' }}</b>--}}
                </h3>
            </div>
            <div class="modal-body">
                {{--@if ($this->session->flashdata('pass') === 1)--}}
                {{--?>--}}
                {{--<div class="alert alert-success">--}}
                {{--<b>Congratulations!</b> You have passed the quiz.--}}
                {{--</div>--}}
                {{--@else--}}
                {{--<div class="alert alert-danger">--}}
                {{--<p>--}}
                {{--<b>So close!</b> You have failed the quiz.--}}
                {{--</p>--}}
                {{--<p>--}}
                {{--You can re-attempt the quiz after reviewing the material.--}}
                {{--</p>--}}
                {{--<a class="btn btn-danger"--}}
                {{--data-href="{{ url('/learning/') }}/{{ $this->session->flashdata('quiz_courseID') ?: '' }}">Re-attempt--}}
                {{--Quiz now</a>--}}
                {{--<a class="btn btn-default" data-dismiss="modal">Re-attempt Quiz later</a>--}}
                {{--</div>--}}
                {{--@endif--}}
                <ul class="uk-list">
                    <li>
                        Questions:&emsp;
                        <span class="uk-badge">
                                {{--                                {{ $this->session->flashdata('total_questions') }}--}}
                            </span>
                    </li>
                    <li>
                        Correct:&emsp;
                        <span class="uk-badge">
                                {{--                                {{ $this->session->flashdata('correct_questions') }}--}}
                            </span>
                    </li>
                    <li>
                        Score:&emsp;
                        <span class="uk-badge">
                                {{--                                {{ number_format($this->session->flashdata('correct_questions') / $this->session->flashdata('total_questions') * 100, 0) . "%" }}--}}
                            </span>
                    </li>
                    <li>
                        Required percentage to pass:&emsp;
                        <span class="uk-badge">
                                {{--                                {{ $this->session->flashdata('required') . "%" }}--}}
                            </span>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                {{--@if ($this->session->flashdata('pass') === 1)--}}
                {{--<button type="button" class="btn btn-danger" data-dismiss="modal">Hurray!</button>--}}
                {{--@endif--}}
            </div>
        </div>
    </div>
</div>