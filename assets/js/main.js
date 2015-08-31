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
		} else {
			console.log('match');
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
	$(".nav-tabs li").removeClass("active");
});