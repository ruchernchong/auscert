$(".nav-tabs").on("click", "a", function(e){
	e.preventDefault();
	$(this).tab('show');
})

.on("click", "span", function () {
	var parent = $(this).closest('ul');
	
	var anchor = $(this).siblings('a');
	$(anchor.attr('href')).remove();
	$(this).parent().remove();
	$(".nav-tabs li").children('a').first().click();

	var children = parent.children();

	for(var i = 2; i < children.length-1; i++) {
		var curr = children.eq(i);
		index = i-2;
		
		if(curr.attr('id') != index) {
			console.log(index);
			curr.attr('id', index);

			$('.tab-content').find('#chapter_'+(index+1)).attr('id', 'chapter_' + index);

			$('#title_' + (index + 1)).attr('id', 'title_' + index);
			$('#title_' + index).attr('name', 'title_' + index);
			$('#editor_' + (index + 1)).attr('id', 'editor_' + index);
			$('#editor_' + index).attr('name', 'editor_' + index);

			curr.html('<a href="#chapter_' + index + '"><i class="fa fa-book"></i>&emsp;' + (index + 1) + ' &mdash;' + $('.tab-content').find('#title_' + (index)).val() + '</a><span><i class="fa fa-times"></i></span>');
			$(".nav-tabs li").removeClass("active");
		}
	}
});

$(".add-contact").click(function(e) {
	e.preventDefault();
	var id = $(".nav-tabs").children().length-3;
	
	var editorx = "editor_" + id;
	$(this).closest('li').before('<li id="' + id + '"><a href="#chapter_' + id + '" data-toggle="tab"><i class="fa fa-book"></i>&emsp;' + (id + 1) + ' &mdash; New Chapter</a><span><i class="fa fa-times"></i></span></li>');         
	$(".tab-content").append('<div class="tab-pane fade" id="chapter_' + id + '"><div class="form-group"><label>Chapter title </label><input class="form-control chapter-title" name="title_' + id + '" id="title_' + id + '" value="New Chapter" required><br /><label>Chapter contents</label><textarea name="editor_' + id + '" id="editor_' + id + '" rows="10" cols="80"></textarea></div></div>');
	// Trying to set tab to inactive when user clicks on "Add Chapter".
	$(".nav-tabs li").removeClass("active");
	CKEDITOR.replace(editorx);
});

$(".tab-content").on("change", ".chapter-title", function() {
	var id = ($(this).attr('id').match(/\d+/)[0])*1;
	$('#' + id).html('<a href="#chapter_' + id + '"><i class="fa fa-book"></i>&emsp;' + (id + 1) + ' &mdash;' + $("#title_" + (id)).val() + '</a><span><i class="fa fa-times"></i></span>');
	// Trying to set tab to inactive when user clicks on "Add Chapter".
	$(".nav-tabs li").removeClass("active");
});

// Delete question script, cascade order to following questions
$("#course_quiz").on("click", ".delete_question", function() {
	var $target = $(this).closest(".form-group");
	var targetNum = $target.attr('id').match(/\d+/)[0]*1;
	console.log(targetNum);
	$target.hide('slow', function(){
		$(this).remove();
	});

	var children = $("#course_quiz").children(".form-group");
	for(var i = targetNum; i < children.length; i++) {
		var curr = children.eq(i+1);
		console.log('q'+i);
		console.log(curr.attr('id'));
		//if(curr.attr('id') != 'q'+i) {
			curr.attr('id', 'q'+i);
			
			curr.find('h3').html('<h3><i class="fa fa-minus-square delete_question" style="color:red"></i> &emsp; Question '+ (i+1) +'</h3>');
			curr.find('textarea').attr('id', 'q'+i);
			curr.find('textarea').attr('name', 'q'+i);
			
			count = 0;
			while(true) {
				if ($('#q'+ (i+1) + 'a' + count).length) {
					var $answer = $('#q'+(i+1)+'a'+count);
					//console.log($answer);
					$answer.attr('id', 'q'+i+'a'+count);
					$answer.attr('name', 'q'+i+'a'+count);
				} else {
					break;
				}
				count++;
			}
		//}
	}
});


// Delete answer script, cascade order to following answers
$("#course_quiz").on("click", ".delete_answer", function() {
	var $question = $(this).closest(".form-group");
	var questionNumber = $(this).closest(".form-group").attr('id').match(/\d+/)[0]*1;
	var answerNumber = $(this).closest('.row').find('input').attr('id').match(/\d+[^\d*](\d+)/)[1]*1;
	$target = $(this).closest(".row").parent().closest(".row");
	$target.hide('slow', function(){ $target.remove(); });


	while(true) {
		if ($('#q'+ questionNumber + 'a' + (answerNumber+1)).length) {
			var $answer = $('#q'+ questionNumber + 'a' + (answerNumber+1));
			//console.log($answer);
			$answer.attr('id', 'q'+questionNumber+'a'+answerNumber);
			$answer.attr('name', 'q'+questionNumber+'a'+answerNumber);
			$answer.closest(".row").parent().closest(".row").find('label').text('Alternate ' + answerNumber);
		} else {
			break;
		}
		answerNumber++;
	}

});


// Adds a new answer to a question
$("#course_quiz").on("click", ".add-answer", function(e){
	e.preventDefault();
	var count = ($(this).parents(".form-group").find(".row").length)/2;
	var question = ($(this).parent().parent().attr('id').match(/\d+/)[0])*1;
	var new_answer = $(
		'<div class="row">'+
		'	<div class="col-md-2">'+
		'		<div class="form-group">'+
		'			<label>Alternate ' + count + ':</label>'+
		'		</div>'+
		'	</div>'+
		'<div class="col-md-2">'+
		'	<div class="row">'+
		'		<div class="col-md-2">'+
		'			<i class="fa fa-minus-square delete_answer" style="color:red"></i>'+
		'		</div>'+
		'		<div class="col-md-2">'+
		'		<div class="form-group">'+
		'			<input size="64" id="q' + question + 'a' + count + '" name="q' + question + 'a' + count + '" required>'+
		'		</div>'+
		'	</div>'+
		'</div>'
		).hide();

	$(this).parent().before(new_answer);
	new_answer.show('slow');
});

$("#add-question").click(function(e) {
	e.preventDefault();
	questionCount = $(this).siblings('.form-group').length;
	var new_question = $(
		'<div class="form-group" id="q' + questionCount + '">'+
		'	<h3><i class="fa fa-minus-square delete_question" style="color:red"></i> &emsp; Question ' + (questionCount+1)  + '</h3>'+
		'	<div class="form-group">'+
		'		<textarea class="form-control" name="question_' + questionCount + '" id="question_' + questionCount + '" rows="10" cols="80"></textarea><br>'+
		'	</div>'+
		'	<div class="row">'+
		'		<div class="col-md-2">'+
		'			<div class="form-group">'+
		'				<label>Correct answer:</label>'+
		'			</div>'+
		'		</div>'+
		'		<div class="col-md-2">'+	
		'			<div class="row">' +
		'				<div class="col-md-2"></div>' +	
		'				<div class="col-md-2">' +
		'					<div class="form-group">'+
		'						<input size="64" id="q' + questionCount + 'a0" name="q' + questionCount + 'a0" required>'+
		'					</div>'+
		'				</div>'+
		'			</div>'+
		'		</div>'+
		'	</div>'+
		'	<div class="row">'+
		'		<div class="col-md-2">'+
		'			<div class="form-group">'+
		'				<label>Alternate 1:</label>'+
		'			</div>'+
		'		</div>'+
		'		<div class="col-md-2">'+	
		'			<div class="row">' +
		'				<div class="col-md-2"></div>' +	
		'				<div class="col-md-2">' +
		'					<div class="form-group">'+
		'						<input size="64" id="q' + questionCount + 'a1" name="q' + questionCount + 'a1" required>'+
		'					</div>'+
		'				</div>'+
		'			</div>'+
		'		</div>'+
		'	</div>'+
		'	<div class="form-group">'+
		'		<a href="#" class="add-answer">Add another Answer</a>'+
		'	</div>'+
		'	<hr>'+
		'</div>'
		).hide();
$(this).before(new_question);
new_question.show('slow');

CKEDITOR.replace('question_' + questionCount);
});

$(".courseActive").click(function() {
	if ($(this).prop('checked') == true) {
		var courseID = $(this).attr('id').match(/\d+/)[0]*1;
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
		var courseID = $(this).attr('id').match(/\d+/)[0]*1;
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

/* Suspend click listener during fade animation
if(quiz.is(':animated')) {        
	return false;
}
choose();

// If no user selection, progress is stopped
if (isNaN(selections[questionCounter])) {
	alert('Please make a selection!');
} else {
	questionCounter++;
	displayNext();
}*/
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

/* Suspend click listener during fade animation
if(quiz.is(':animated')) {        
	return false;
}
choose();

// If no user selection, progress is stopped
if (isNaN(selections[questionCounter])) {
	alert('Please make a selection!');
} else {
	questionCounter++;
	displayNext();
}*/
});