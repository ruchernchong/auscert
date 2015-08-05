$(document).ready(function(){ //called once the page has loaded
	$('#custom').html("THIS TEXT WAS INSERTED BY JQUERY. This is a test piece of text. You can see that tags can be used as normal, such as <strong>strong</strong> and <em>emphasis</em>. You can also use <a href='http://www.google.com'>links</a>"); //'catch' bottom solution
	
	$("#custom").load("../text/custom.txt"); //won't work locally.
	
	console.log("function called");
});
