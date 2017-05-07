$(".tab-content").on('click', ".chapter-delete", function () {
    var tabBar = $('#tab-bar');
    var tabContent = $(this).closest('.tab-pane');
    var index = tabContent.attr('id').match(/\d+/)[0] * 1

    $('#chapter-' + index).remove();
    var $deletedTab = $('#chapter-tab-' + index);
    $('.nav-tabs a[href="' + $deletedTab.prev().find('a').attr('href') + '"]').tab('show');
    $deletedTab.remove();

    var tabs = tabBar.children();

    for (var i = 1; i < tabs.length - 1; i++) {
        var $curr = tabs.eq(i);
        var index = i - 1;

        if ($curr.attr('id') != 'chapter-tab-' + index) {
            reorderChapter((index + 1), index);
        }
    }
});

$(".tab-content").on('click', ".chapter-move-right", function () {
    var tabBar = $('#tab-bar');
    var tabContent = $(this).closest('.tab-pane');
    var index = tabContent.attr('id').match(/\d+/)[0] * 1

    var $swapTarget = $('#chapter-tab-' + (index + 1));

    if (!$swapTarget.length) {
        return;
    }

    $swapTarget.after($('#chapter-tab-' + index));
    reorderChapter((index + 1), -1);
    reorderChapter(index, (index + 1));
    reorderChapter(-1, index);
});

$(".tab-content").on('click', ".chapter-move-left", function () {
    var tabBar = $('#tab-bar');
    var tabContent = $(this).closest('.tab-pane');
    var index = tabContent.attr('id').match(/\d+/)[0] * 1

    var $swapTarget = $('#chapter-tab-' + (index - 1));
    if (!$swapTarget.length) {
        return;
    }

    $swapTarget.before($('#chapter-tab-' + index));
    reorderChapter((index - 1), -1);
    reorderChapter(index, (index - 1));
    reorderChapter(-1, index);
});

$("#add-chapter").click(function (e) {
    e.preventDefault();

    var id = $(".nav-tabs").children().length - 3;
    var editorx = "editor-" + id;

    $(this).closest('li').before(
        '<li id="chapter-tab-' + id + '">' +
        '<a href="#chapter-' + id + '" data-toggle="tab">' +
        '<i class="fa fa-book"></i>&emsp;' + (id + 1) + ' &mdash; New Chapter</a>' +
        '</li>');
    $(".tab-content").append(
        '<div class="tab-pane fade" id="chapter-' + id + '">' +
        '<div class="col-lg-12">' +
        '<ul class="pager">' +
        '<label>Chapter controls&emsp;</label>' +
        '<li>' +
        '<a type="button" class="btn btn-default chapter-move-left">' +
        '<i class="fa fa-caret-square-o-left fa-fw"></i>' +
        'Move Left' +
        '</a>' +
        '</li>' +
        '<li>' +
        '<a type="button" class="btn btn-default chapter-delete">' +
        '<i class="fa fa-minus-square fa-fw" style="color:red"></i>' +
        'Delete Chapter' +
        '</a>' +
        '</li>' +
        '<li>' +
        '<a type="button" class="btn btn-default chapter-move-right">' +
        '<i class="fa fa-caret-square-o-right fa-fw"></i>' +
        'Move Right' +
        '</a>' +
        '</li>' +
        '</ul>' +
        '</div>' +
        '<div class="form-group">' +
        '<label>Chapter title </label>' +
        '<input class="form-control chapter-title" name="title-' + id + '" id="title-' + id + '" value="New Chapter" required>' +
        '<br />' +
        '<label>Chapter contents</label>' +
        '<textarea name="editor-' + id + '" id="editor-' + id + '" rows="10" cols="80">' +
        '</textarea>' +
        '</div>' +
        '</div>'
    );
    CKEDITOR.replace(editorx);

    setTimeout(showTab, 0, id);

});

function showTab(id) {
    $('.nav-tabs a[href="#chapter-' + id + '"]').tab('show');
}

$(".tab-content").on("keyup", ".chapter-title", function () {
    var id = ($(this).attr('id').match(/\d+/)[0]) * 1;

    $("#chapter-tab-" + id).html('<a href="#chapter-' + id + '" data-toggle="tab"><i class="fa fa-book"></i>&emsp;' + (id + 1) + ' &mdash;' + $("#title-" + (id)).val() + '</a>');
});

$(".tab-content").on("focus", ".chapter-title", function () {
    var id = ($(this).attr('id').match(/\d+/)[0]) * 1;

    $("#chapter-tab-" + id).html('<a href="#chapter-' + id + '" data-toggle="tab"><i class="fa fa-book"></i>&emsp;' + (id + 1) + ' &mdash;' + $("#title-" + (id)).val() + '</a>');
});

$("#course-quiz").on("click", ".delete-question", function () {
    var $target = $(this).closest(".form-group");
    var targetNum = $target.attr('id').match(/\d+/)[0] * 1;

    console.log(targetNum);

    $target.hide('slow', function () {
        $(this).remove();
    });

    var children = $("#course-quiz").children(".form-group");
    for (var i = targetNum; i < children.length; i++) {
        var curr = children.eq(i + 1);
        curr.attr('id', 'q' + i);

        curr.find('h3').html('<h3><i class="fa fa-minus-square delete-question" style="color:red"></i> &emsp; Question ' + (i + 1) + '</h3>');
        curr.find('textarea').attr('id', 'q' + i);
        curr.find('textarea').attr('name', 'q' + i);

        count = 0;

        while (true) {
            if ($('#q' + (i + 1) + 'a' + count).length) {
                var $answer = $('#q' + (i + 1) + 'a' + count);
                $answer.attr('id', 'q' + i + 'a' + count);
                $answer.attr('name', 'q' + i + 'a' + count);
            } else {
                break;
            }
            count++;
        }
    }
});

$("#course-quiz").on("click", ".delete-answer", function () {
    var $question = $(this).closest(".form-group");
    var questionNumber = $(this).closest(".form-group").attr('id').match(/\d+/)[0] * 1;
    var answerNumber = $(this).closest('.row').find('input').last().attr('id').match(/\d+[^\d*](\d+)/)[1] * 1;

    $target = $(this).closest(".row").parent().closest(".row");
    $target.hide('slow', function () {
        $target.remove();
    });

    while (true) {
        if ($('#q' + questionNumber + 'a' + (answerNumber + 1)).length) {
            var $answer = $('#q' + questionNumber + 'a' + (answerNumber + 1));

            $answer.attr('id', 'q' + questionNumber + 'a' + answerNumber);
            $answer.attr('name', 'q' + questionNumber + 'a' + answerNumber);
            $answer.closest(".row").parent().closest(".row").find('label').text('Alternate ' + answerNumber);
        } else {
            break;
        }
        answerNumber++;
    }
    $("#add-answer-" + questionNumber).show('fast');
});

$("#course-quiz").on("click", ".add-answer", function (e) {
    e.preventDefault();
    console.log('ping');

    var count = (($(this).parents(".form-group").find(".row").length) / 2);
    var question = ($(this).parent().parent().attr('id').match(/\d+/)[0]) * 1;
    var new_answer = $(
        '<div class="row">' +
        '	<div class="col-md-2">' +
        '		<div class="form-group">' +
        '			<label>Answer ' + (count + 1) + ':</label>' +
        '		</div>' +
        '	</div>' +
        '<div class="col-md-2">' +
        '	<div class="row">' +
        '		<div class="col-md-2">' +
        '			<i class="fa fa-minus-square delete-answer" style="color:red"></i>' +
        '		</div>' +
        '		<div class="col-md-2">' +
        '			<input type="radio" name="c-q' + question + '" value="' + count + '" required/>' +
        '		</div>' +
        '		<div class="col-md-2">' +
        '		<div class="form-group">' +
        '			<input size="64" id="q' + question + 'a' + count + '" name="q' + question + 'a' + count + '" required>' +
        '		</div>' +
        '	</div>' +
        '</div>'
    ).hide();

    $(this).parent().before(new_answer);
    new_answer.show('slow');
    if (count >= 9) {
        $("#add-answer-" + question).hide('fast');
    }

});

$("#add-question").click(function (e) {
    e.preventDefault();

    questionCount = $(this).siblings('.form-group').length;
    var new_question = $(
        '<div class="form-group" id="q' + questionCount + '">' +
        '	<h3><i class="fa fa-minus-square delete-question" style="color:red"></i> &emsp; Question ' + (questionCount + 1) + '</h3>' +
        '	<div class="form-group">' +
        '		<textarea class="form-control" name="question-' + questionCount + '" id="question-' + questionCount + '" rows="10" cols="80"></textarea><br>' +
        '	</div>' +
        '	<div class="row">' +
        '		<div class="col-md-2">' +
        '			<div class="form-group">' +
        '				<label>Answer 1:</label>' +
        '			</div>' +
        '		</div>' +
        '		<div class="col-md-2">' +
        '			<div class="row">' +
        '				<div class="col-md-2"></div>' +
        '				<div class="col-md-2">' +
        '					<input type="radio" name="c-q' + questionCount + '" value="0" required/>' +
        '				</div>' +
        '				<div class="col-md-2">' +
        '					<div class="form-group">' +
        '						<input size="64" id="q' + questionCount + 'a0" name="q' + questionCount + 'a0" required>' +
        '					</div>' +
        '				</div>' +
        '			</div>' +
        '		</div>' +
        '	</div>' +
        '	<div class="row">' +
        '		<div class="col-md-2">' +
        '			<div class="form-group">' +
        '				<label>Answer 2:</label>' +
        '			</div>' +
        '		</div>' +
        '		<div class="col-md-2">' +
        '			<div class="row">' +
        '				<div class="col-md-2"></div>' +
        '				<div class="col-md-2">' +
        '					<input type="radio" name="c-q' + questionCount + '" value="1" required/>' +
        '				</div>' +
        '				<div class="col-md-2">' +
        '					<div class="form-group">' +
        '						<input size="64" id="q' + questionCount + 'a1" name="q' + questionCount + 'a1" required>' +
        '					</div>' +
        '				</div>' +
        '			</div>' +
        '		</div>' +
        '	</div>' +
        '	<div class="form-group">' +
        '		<a href="#" class="btn btn-primary add-answer" id="add-answer-' + questionCount + '"><i class="fa fa-plus"></i>&emsp;Answer</a>' +
        '	</div>' +
        '	<hr>' +
        '</div>'
    ).hide();

    $(this).before(new_question);
    new_question.show('slow');

    CKEDITOR.replace('question-' + questionCount);
});


$(".courseActive").click(function () {
    if ($(this).prop('checked') == true) {
        var courseID = $(this).attr('id').match(/\d+/)[0] * 1;
        $.ajax({
            method: "POST",
            url: "admin/ifActive",
            data: {
                'courseID': courseID
            },
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    } else {
        var courseID = $(this).attr('id').match(/\d+/)[0] * 1;
        $.ajax({
            method: "POST",
            url: "admin/ifNotActive",
            data: {
                'courseID': courseID
            },
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
});

$('#next').click(function (e) {
    $target = $('#current-question');

    if ($target.next().length == 0) {
        $form = $('#userInput')[0];

        if ($form.checkValidity()) {
            $form.submit();
        } else {
            alert("There are unanswered questions.");
        }
        return;
    }

    if ($target.next().next().length == 0) {
        $(this).animate({opacity: 0}, 200, function (e) {
            $(this).removeClass("fa-chevron-circle-right");
            $(this).css('color', '#7f7');
            $(this).addClass("fa-caret-square-o-right");
            $(this).animate({opacity: 1}, 400);
        });
    }

    $('#prev').animate({opacity: 1})

    $target.removeAttr("id");
    $target.next().attr('id', 'current-question');

    $target.hide('slow');
    $target.next().show('slow');

    e.preventDefault();
});

$('#prev').click(function (e) {
    $target = $('#current-question');

    if ($target.prev().length == 0) {
        return;
    }

    if ($target.prev().prev().length == 0) {
        $(this).animate({opacity: 0});
    }

    $next = $('#next');
    if ($next.hasClass("fa-caret-square-o-right")) {
        $next.animate({opacity: 0}, 200, function (e) {
            $next.removeClass("fa-caret-square-o-right");
            $next.css('color', '#bbb');
            $next.addClass("fa-chevron-circle-right");
            $next.animate({opacity: 1}, 400);
        });
    }

    $target.removeAttr("id");
    $target.prev().attr('id', 'current-question');

    $target.hide('slow');
    $target.prev().show('slow');

    e.preventDefault();
});

function reorderChapter(currentIndex, newIndex) {
    var $tab = $('#chapter-tab-' + currentIndex);
    var $tabContent = $('#chapter-' + currentIndex);

    $tab.attr('id', 'chapter-tab-' + newIndex);
    $link = $tab.find('a');
    $link.attr('href', '#chapter-' + newIndex);
    $link.empty();
    $link.append($('<i class="fa fa-book"></i>'));
    $link.append('&emsp;' + (newIndex + 1) + ' &mdash; ' + $tabContent.find('input').val());

    $tabContent.attr('id', 'chapter-' + newIndex);
    $tabContent.find('input').attr('id', 'title-' + newIndex);
    $tabContent.find('input').attr('name', 'title-' + newIndex);
    $tabContent.find('textarea').attr('id', 'editor-' + newIndex);
    $tabContent.find('textarea').attr('name', 'editor-' + newIndex);
}

$(function () {
    $('.chapter-title').on('invalid', function () {
        var $closest = $(this).closest('.tab-pane');
        var id = $closest.attr('id');

        $('.nav a[href="#' + id + '"]').tab('show');
        $('#userInput').valid();
    });
});

(function () {
    var questions = [{
        question: "What is 2*5?",
        choices: [2, 5, 10, 15],
        correctAnswer: 2
    },
        {
            question: "What is 3*6?",
            choices: [3, 6, 9, 18],
            correctAnswer: 3
        },
        {
            question: "What is 8*9?",
            choices: [72, 99, 108, 134],
            correctAnswer: 0
        },
        {
            question: "What is 1*7?",
            choices: [4, 5, 6, 7],
            correctAnswer: 3
        },
        {
            question: "What is 8*8?",
            choices: [20, 30, 40, 64],
            correctAnswer: 3
        }];

    var questionCounter = 0;
    var selections = [];
    var quiz = $('#quiz');

    displayNext();

    $('#next').on('click', function (e) {
        e.preventDefault();

        if (quiz.is(':animated')) {
            return false;
        }
        choose();

        if (isNaN(selections[questionCounter])) {
            alert('Please make a selection!');
        } else {
            questionCounter++;
            displayNext();
        }
    });

    $('#prev').on('click', function (e) {
        e.preventDefault();

        if (quiz.is(':animated')) {
            return false;
        }

        choose();
        questionCounter--;
        displayNext();
    });

    $('#start').on('click', function (e) {
        e.preventDefault();

        if (quiz.is(':animated')) {
            return false;
        }

        questionCounter = 0;
        selections = [];
        displayNext();

        $('#start').hide();
    });

    $('.button').on('mouseenter', function () {
        $(this).addClass('active');
    });

    $('.button').on('mouseleave', function () {
        $(this).removeClass('active');
    });

    function createQuestionElement(index) {
        var qElement = $('<div>',
            {
                id: 'question'
            });

        var header = $('<h1>Question ' + (index + 1) + ':</h2>');
        qElement.append(header);

        var question = $('<p>').append(questions[index].question);
        qElement.append(question);

        var radioButtons = createRadios(index);
        qElement.append(radioButtons);

        return qElement;
    }

    function createRadios(index) {
        var radioList = $('<ul>');
        var item;
        var input = '';

        for (var i = 0; i < questions[index].choices.length; i++) {
            item = $('<li>');
            input = '<input type="radio" name="answer" value=' + i + ' />';
            input += questions[index].choices[i];
            item.append(input);
            radioList.append(item);
        }
        return radioList;
    }

    function choose() {
        selections[questionCounter] = +$('input[name="answer"]:checked').val();
    }

    function displayNext() {
        quiz.fadeOut(function () {
            $('#question').remove();

            if (questionCounter < questions.length) {
                var nextQuestion = createQuestionElement(questionCounter);

                quiz.append(nextQuestion).fadeIn();

                if (!(isNaN(selections[questionCounter]))) {
                    $('input[value=' + selections[questionCounter] + ']').prop('checked', true);
                }

                // Controls display of 'prev' button
                if (questionCounter === 1) {
                    $('#prev').show();
                } else if (questionCounter === 0) {
                    $('#prev').hide();
                    $('#next').show();
                }
            } else {
                var scoreElem = displayScore();

                quiz.append(scoreElem).fadeIn();
                $('#next').hide();
                $('#prev').hide();
                $('#start').show();
            }
        });
    }

    function displayScore() {
        var score = $('<p>', {id: 'question'});
        var numCorrect = 0;

        for (var i = 0; i < selections.length; i++) {
            if (selections[i] === questions[i].correctAnswer) {
                numCorrect++;
            }
        }

        score.append('You got ' + numCorrect + ' questions out of ' + questions.length + ' correct!');
        return score;
    }
})();

$(function () {
    $('*[data-href]').click(function () {
        window.location = $(this).data('href');
        return false;
    });
});