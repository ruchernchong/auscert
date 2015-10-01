// Delete chapter
$(".tab-content").on('click', ".chapter-delete", function() {
	var tabBar = $('#tab-bar');
	var tabContent = $(this).closest('.tab-pane');
	var index = tabContent.attr('id').match(/\d+/)[0] * 1

	$('#chapter-' + index).remove();
	var $deletedTab = $('#chapter-tab-' + index);
	$('.nav-tabs a[href="' + $deletedTab.prev().find('a').attr('href') + '"]').tab('show');
	$deletedTab.remove();

	var tabs = tabBar.children();

	for(var i = 2; i < tabs.length - 1; i++) {
		var $curr = tabs.eq(i);
		var index = i - 2;
		
		if ($curr.attr('id') != 'chapter-tab-'+index) {
			reorderChapter((index+1), index);
		}
	}
});

// Move chapter right
$(".tab-content").on('click', ".chapter-move-right", function() {
	var tabBar = $('#tab-bar');
	var tabContent = $(this).closest('.tab-pane');
	var index = tabContent.attr('id').match(/\d+/)[0] * 1

	var $swapTarget = $('#chapter-tab-' + (index + 1));

	if( ! $swapTarget.length) {
		return;
	}

	$swapTarget.after($('#chapter-tab-' + index));
	reorderChapter((index+1), -1);
	reorderChapter(index, (index+1));
	reorderChapter(-1, index);
});

// Move chaoter left
$(".tab-content").on('click', ".chapter-move-left", function() {
	var tabBar = $('#tab-bar');
	var tabContent = $(this).closest('.tab-pane');
	var index = tabContent.attr('id').match(/\d+/)[0] * 1

	var $swapTarget = $('#chapter-tab-' + (index - 1));
	if( ! $swapTarget.length) {
		return;
	}

	$swapTarget.before($('#chapter-tab-' + index));
	reorderChapter((index-1), -1);
	reorderChapter(index, (index-1));
	reorderChapter(-1, index);
});


// Add chapter
$("#add-chapter").click(function(e) {
	e.preventDefault();

	var id = $(".nav-tabs").children().length - 3;
	var editorx = "editor-" + id;

	$(this).closest('li').before('<li id="chapter-tab-' + id + '"><a href="#chapter-' + id + '" data-toggle="tab"><i class="fa fa-book"></i>&emsp;' + (id + 1) + ' &mdash; New Chapter</a></li>');         
	$(".tab-content").append('<div class="tab-pane fade" id="chapter-' + id + '"><label>Chapter controls</label> <div class="row"><div class="col-md-3"><i class="fa fa-caret-square-o-left fa-2x chapter-move-left"></i> Move Left</div><div class="col-md-3"><i class="fa fa-minus-square fa-2x chapter-delete"style="color:red"></i> Delete Chapter</div><div class="col-md-3"><i class="fa fa-caret-square-o-right fa-2x chapter-move-right"></i> Move Right</div></div><br>		<div class="form-group"><label>Chapter title </label><input class="form-control chapter-title" name="title-' + id + '" id="title-' + id + '" value="New Chapter" required><br /><label>Chapter contents</label><textarea name="editor-' + id + '" id="editor-' + id + '" rows="10" cols="80"></textarea></div></div>');
	CKEDITOR.replace(editorx);
	$('.nav-tabs a[href="#chapter-' + id + '"]').tab('show');
});

// Dynamically update chapter titles
$(".tab-content").on("change", ".chapter-title", function() {
	var id = ($(this).attr('id').match(/\d+/)[0]) * 1;

	$('#chapter-tab-' + id).html('<a href="#chapter-' + id + '" data-toggle="tab"><i class="fa fa-book"></i>&emsp; ' + (id + 1) + ' &mdash;' + $("#title-" + (id)).val() + '</a>');
});

// Delete question script, cascade order to following questions
$("#course-quiz").on("click", ".delete-question", function() {
	var $target = $(this).closest(".form-group");
	var targetNum = $target.attr('id').match(/\d+/)[0] * 1;

	console.log(targetNum);

	$target.hide('slow', function(){
		$(this).remove();
	});

	var children = $("#course-quiz").children(".form-group");
	for (var i = targetNum; i < children.length; i++) {
		var curr = children.eq(i + 1);

		//console.log('q-' + i);
		//console.log(curr.attr('id'));
		curr.attr('id', 'q' + i);

		curr.find('h3').html('<h3><i class="fa fa-minus-square delete_question" style="color:red"></i> &emsp; Question ' + (i + 1) + '</h3>');
		curr.find('textarea').attr('id', 'q' + i);
		curr.find('textarea').attr('name', 'q' + i);

		count = 0;

		while (true) {
			if ($('#q' + (i + 1) + 'a' + count).length) {
				var $answer = $('#q'+(i + 1) + 'a' + count);
				$answer.attr('id', 'q' + i + 'a' + count);
				$answer.attr('name', 'q' + i + 'a' + count);
			} else {
				break;
			}
			count++;
		}
	}
});

// Delete answer script, cascade order to following answers
$("#course-quiz").on("click", ".delete_answer", function() {
	console.log('del_a');
	var $question = $(this).closest(".form-group");
	var questionNumber = $(this).closest(".form-group").attr('id').match(/\d+/)[0] * 1;
	var answerNumber = $(this).closest('.row').find('input').attr('id').match(/\d+[^\d*](\d+)/)[1] * 1;

	$target = $(this).closest(".row").parent().closest(".row");
	$target.hide('slow', function() {
		$target.remove();
	});

	while(true) {
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
});

// Adds a new answer to a question
$("#course-quiz").on("click", ".add-answer", function(e) {
	e.preventDefault();
	console.log('ping');

	var count = (($(this).parents(".form-group").find(".row").length) / 2)+1;
	var question = ($(this).parent().parent().attr('id').match(/\d+/)[0]) * 1;
	var new_answer = $(
		'<div class="row">' +
		'	<div class="col-md-2">' +
		'		<div class="form-group">' +
		'			<label>Answer ' + count + ':</label>' +
		'		</div>' +
		'	</div>' +
		'<div class="col-md-2">' +
		'	<div class="row">' +
		'		<div class="col-md-2">' +
		'			<i class="fa fa-minus-square delete_answer" style="color:red"></i>'+
		'		</div>' +
		'		<div class="col-md-2">' +
		'			<input type="radio" name="c-q' + question + '" value="' + count + '" required/>' +
		'		</div>' +
		'		<div class="col-md-2">' +
		'		<div class="form-group">' +
		'			<input size="64" id="q' + question + 'a' + count + '" name="q' + question + 'a' + count + '" required>'+
		'		</div>' +
		'	</div>' +
		'</div>'
		).hide();

	$(this).parent().before(new_answer);
	new_answer.show('slow');
});

$("#add-question").click(function(e) {
	e.preventDefault();

	questionCount = $(this).siblings('.form-group').length;
	var new_question = $(
		'<div class="form-group" id="q' + questionCount + '">' +
		'	<h3><i class="fa fa-minus-square delete_question" style="color:red"></i> &emsp; Question ' + (questionCount + 1)  + '</h3>' +
		'	<div class="form-group">' +
		'		<textarea class="form-control" name="question_' + questionCount + '" id="question_' + questionCount + '" rows="10" cols="80"></textarea><br>' +
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
		'					<input type="radio" name="c-q' + questionCount +'" value="1" required/>' +
		'				</div>' +
		'				<div class="col-md-2">' +
		'					<div class="form-group">'+
		'						<input size="64" id="q' + questionCount + 'a1" name="q' + questionCount + 'a1" required>' +
		'					</div>' +
		'				</div>' +
		'			</div>' +
		'		</div>' +
		'	</div>' +
		'	<div class="form-group">' +
		'		<a href="#" class="add-answer">Add another Answer</a>' +
		'	</div>' +
		'	<hr>' +
		'</div>'
		).hide();

	$(this).before(new_question);
	new_question.show('slow');

	CKEDITOR.replace('question_' + questionCount);
});


//Ajax method for handling course status based on the state of the checkbox
$(".courseActive").click(function() {
	if ($(this).prop('checked') == true) {
		var courseID = $(this).attr('id').match(/\d+/)[0] * 1;
		$.ajax({
			method: "POST",
			url: "admin/ifActive",
			data: {
				'courseID' : courseID
			},
			success: function(response) {
				console.log(response);
			},
			error: function(error) {
				console.log(error);
			}
		});
	} else {
		var courseID = $(this).attr('id').match(/\d+/)[0] * 1;
		$.ajax({
			method: "POST",
			url: "admin/ifNotActive",
			data: {
				'courseID' : courseID
			},
			success: function(response) {
				console.log(response);
			},
			error: function(error) {
				console.log(error);
			}
		});
	}
});

// Click handler for the 'next' button
$('#next').click(function(e) {
	$target = $('#current_question');

	if($target.next().length == 0) {
		$form = $('#userInput')[0];

		if ($form.checkValidity()) {
			$form.submit();
		} else {
			alert("There are unanswered questions.");
		}
		return;
	}

	if($target.next().next().length == 0) {
		$(this).animate({opacity:0}, 200, function(e) {
			$(this).removeClass("fa-chevron-circle-right");
			$(this).css('color', '#7f7');
			$(this).addClass("fa-caret-square-o-right");
			$(this).animate({opacity:1}, 400);
		});
	}
	
	$('#prev').animate({opacity:1})

	$target.removeAttr("id");
	$target.next().attr('id', 'current_question');
	
	$target.hide('slow');
	$target.next().show('slow');

	e.preventDefault();
});

// Click handler for the 'next' button
$('#prev').click(function(e) {
	$target = $('#current_question');

	if($target.prev().length == 0) {
		return;
	}

	if($target.prev().prev().length == 0) {
		$(this).animate({opacity:0});
	}

	$next = $('#next');
	if($next.hasClass("fa-caret-square-o-right")) {
		$next.animate({opacity:0}, 200, function(e) {
			$next.removeClass("fa-caret-square-o-right");
			$next.css('color', '#bbb');
			$next.addClass("fa-chevron-circle-right");
			$next.animate({opacity:1}, 400);
		});
	}

	$target.removeAttr("id");
	$target.prev().attr('id', 'current_question');
	
	$target.hide('slow');
	$target.prev().show('slow');
	
	e.preventDefault();
});

function reorderChapter(currentIndex, newIndex) {	
	//console.log(currentIndex);

	var $tab = $('#chapter-tab-'+currentIndex);
	var $tabContent = $('#chapter-'+currentIndex);
	//console.log('#chapter-tab-'+currentIndex);

	$tab.attr('id', 'chapter-tab-' + newIndex);
	$link = $tab.find('a');
	$link.attr('href', '#chapter-'+newIndex);
	$link.empty();
	$link.append($('<i class="fa fa-book"></i>'));
	$link.append('&emsp;' + (newIndex+1) + ' &mdash; ' + $tabContent.find('input').attr('value'));
	
	$tabContent.attr('id', 'chapter-' + newIndex);
	$tabContent.find('input').attr('id', 'title-' + newIndex);
	$tabContent.find('input').attr('name', 'title-' + newIndex);
	$tabContent.find('textarea').attr('id', 'editor-' + newIndex);
	$tabContent.find('textarea').attr('name', 'editor-' + newIndex);
}