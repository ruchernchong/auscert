$('#add').click(function() {
    var p = $(this).closest('p'),
        i = p.index() + 1;
    
    $(p).before('<p> <label> Question ' + i + ': </label> <input class="form-control" id="url_' + i + '"> <label> Option a: <input class="form-control" id="url_' + i + '"> </label> <label> Option b: <input class="form-control" id="url_' + i + '"> </label> <label> Option c: <input class="form-control" id="url_' + i + '"> </label> <label> Option d: <input class="form-control" id="url_' + i + '"> </label></br><label>Answer ' + i + ': </label> <label class="radio-inline_' + i + '"><input type="radio" name="optionsRadiosInline_'+ i +'" id="options0' + i + '" value="option0" checked>a</label><label class="radio-inline_' + i +'"><input type="radio" name="optionsRadiosInline_'+ i +'" id="options1' + i + '" value="option1">b</label><label class="radio-inline' + i +'"><input type="radio" name="optionsRadiosInline_'+ i +'" id="options2' + i + '" value="option2">c</label> <label class="radio-inline_'+ i +'"><input type="radio" name="optionsRadiosInline_'+ i +'" id="options3' + i + '" value="option3">d</label></p>');    
    return false; 
	
});
var editorx
var selected;


$(".nav-tabs").on("click", "a", function(e){
      e.preventDefault();
      $(this).tab('show');
    })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".nav-tabs li").children('a').first().click();
    });

 $(".nav-tabs").on("click", "a", function(e){
      e.preventDefault();
      $(this).tab('show');
    })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".nav-tabs li").children('a').first().click();
    });

    $(".nav-tabs").on("click", "a", function(e){
      e.preventDefault();
      $(this).tab('show');
    })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".nav-tabs li").children('a').first().click();
    });

    $('.add-contact').click(function(e) {
        e.preventDefault();
        var id = $(".nav-tabs").children().length-2; //think about it ;)
		var editorx="editor"+id;
        $(this).closest('li').before('<li><a href="#chapter_'+id+'">Chapter '+id+'</a><span>x</span></li>');         
        $('.tab-content').append('<div class="tab-pane fade" id="chapter_'+id+'"><div class="form-group"><label>Chapter title </label><input class="form-control" name="title_'+id+'"><br /><label>Chapter contents</label><textarea name="editor'+id+'" id="editor'+id+'" rows="10" cols="80"></textarea></div></div>');
		CKEDITOR.replace( editorx );
		});
