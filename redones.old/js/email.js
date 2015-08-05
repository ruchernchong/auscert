var selected;

$(document).ready(function(){ //called once the page has loaded
	document.getElementById('content1').style.display="none";
	document.getElementById('text1').style.display="none";
	document.getElementById('text2').style.display="none";
	document.getElementById('delete1').style.display="none";
	
	$("#mail1").click(function(){ //first email
		$("#title1").text('Hey, this is your friend.'); //embed a youtube video
		document.getElementById('content1').style.display="block";
		document.getElementById('mail1').style.color='#0066FF';
		document.getElementById('mail2').style.color='#000';
		document.getElementById('text1').style.display="block";
		document.getElementById('text2').style.display="none";
		document.getElementById('delete1').style.display="block";
		selected = "mail1";
	});
	
	$("#mail2").click(function(){ //second email
		$("#title1").text('Quick, the Universe is in need of saving!'); //embed a youtube video
		document.getElementById('content1').style.display="block";
		document.getElementById('mail1').style.color='#000';
		document.getElementById('mail2').style.color='#0066FF';
		document.getElementById('text1').style.display="none";
		document.getElementById('text2').style.display="block";
		document.getElementById('delete1').style.display="block";
		selected = "mail2";
	});
	
	$("#delete1").click(function(){ //second email
		if (selected == "mail1") {
			window.alert("Well Done!");
		}else if (selected == "mail2") {
			window.alert("Wrong.");
		}else{
			window.alert("Error.");
		}
	});
});
