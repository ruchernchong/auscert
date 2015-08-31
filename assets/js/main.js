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
		} else {
			console.log('match');
		}
	}
});

$(".add-contact").click(function(e) {
	e.preventDefault();
	var id = $(".nav-tabs").children().length-3;
	
	var editorx = "editor_" + id;
	$(this).closest('li').before('<li id="'+id+'"><a href="#chapter_' + id + '" data-toggle="tab"><i class="fa fa-book"></i>&emsp;' + (id + 1) + ' &mdash; New Chapter</a><span><i class="fa fa-times"></i></span></li>');         
	$(".tab-content").append('<div class="tab-pane fade" id="chapter_' + id + '"><div class="form-group"><label>Chapter title </label><input class="form-control chapter-title" name="title_' + id + '" id="title_' + id + '" value="New Chapter" required><br /><label>Chapter contents</label><textarea name="editor_' + id + '" id="editor_' + id + '" rows="10" cols="80"></textarea></div></div>');
	CKEDITOR.replace(editorx);
});

$(".tab-content").on("change", ".chapter-title", function() {
	var id = ($(this).attr('id').match(/\d+/)[0])*1;
	$('#' + id).html('<a href="#chapter_' + id + '"><i class="fa fa-book"></i>&emsp;' + (id + 1) + ' &mdash;' + $("#title_" + (id)).val() + '</a><span><i class="fa fa-times"></i></span>');
});


$("#course_quiz").on("click", ".add-answer", function(e){
	e.preventDefault();
	var count = $(this).parents(".form-group").find(".row").length;
	var question = ($(this).parent().parent().attr('id').match(/\d+/)[0])*1;
	console.log(count);
	console.log(question);
	$(this).parent().before('<div class="row"><div class="col-md-2"><label>Alternate '+count+':</label></div><div class="col-md-2"><input size="64" id="q'+question+'a'+count+'" name="q'+question+'a'+count+'"></div></div>');
});

$("#add-question").click(function(e) {
	e.preventDefault();
	questionCount = $(this).parent().siblings('.form-group').length;
	$(this).parent().before(
			'<div class="form-group" id="q'+questionCount+'">'+
			'	<h3>Question '+questionCount+'</h3><br>'+
			'	<textarea class="form-control" name="question_'+questionCount+'" id="question_'+questionCount+
			'" rows="10" cols="80"></textarea><br>'+
			'	<div class="row">'+
			'		<div class="col-md-2">'+
			'			<label>Correct answer:</label>'+
			'		</div>'+
			'		<div class="col-md-2">'+
			'		<input size="64" id="q'+questionCount+'a0" name="q'+questionCount+'a0">'+
			'		</div>'+
			'	</div>'+
			'	<div class="row">'+
			'		<div class="col-md-2">'+
			'			<label>Alternate 1:</label>'+
			'		</div>'+
			'		<div class="col-md-2">'+
			'			<input size="64" id="q'+questionCount+'a1" name="q'+questionCount+'a1">'+
			'		</div>'+
			'		</div>'+
			'		<div class="form-group">'+
			'		<a href="#" class="add-answer">Add another Answer</a>'+
			'	</div>'+
			'</div><hr>'
	);
	
	CKEDITOR.replace('question_'+questionCount);
});

