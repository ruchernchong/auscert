var selected1;

$(document).ready(function(){ //called once the page has loaded
	document.getElementById('content').style.display="none";
	document.getElementById('text1').style.display="none";
	document.getElementById('text2').style.display="none";
	document.getElementById('delete').style.display="none";
	
	$("#mail1").click(function(){ //first email
		$("#title").text('Hey, this is your friend.'); //embed a youtube video
		document.getElementById('content').style.display="block";
		document.getElementById('mail1').style.color='#0066FF';
		document.getElementById('mail2').style.color='#000';
		document.getElementById('text1').style.display="block";
		document.getElementById('text2').style.display="none";
		document.getElementById('delete').style.display="block";
		selected1 = "mail1";
	});
	
	$("#mail2").click(function(){ //second email
		$("#title").text('Quick, the Universe is in need of saving!'); //embed a youtube video
		document.getElementById('content').style.display="block";
		document.getElementById('mail1').style.color='#000';
		document.getElementById('mail2').style.color='#0066FF';
		document.getElementById('text1').style.display="none";
		document.getElementById('text2').style.display="block";
		document.getElementById('delete').style.display="block";
		selected1 = "mail2";
	});
	
	$("#delete").click(function(){ //second email
		if (selected1 == "mail1") {
			window.alert("Well Done!");
		}else if (selected1 == "mail2") {
			window.alert("Wrong.");
		}else{
			window.alert("Error.");
		}
	});
});
