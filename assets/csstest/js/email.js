var selected;

$(document).ready(function(){ //called once the page has loaded
	document.getElementById('mail1').style.color='#0066FF';
	document.getElementById('text1').style.display="block";
	document.getElementById('text2').style.display="none";
	document.getElementById('text3').style.display="none";
	document.getElementById('txtreply').style.display="none";
	document.getElementById('options2').style.display="none";
	selected = "mail1";
	
	function resetoptions(){
		document.getElementById('txtreply').style.display="none";
		document.getElementById('options2').style.display="none";
		document.getElementById('options').style.display="block";
	}
	
	function showJohn() {
		document.getElementById('mail2').style.color='#0066FF';
		document.getElementById('text2').style.display="block";
	}
	
	$("#mail1").click(function(){ //first email
		resetoptions();
		document.getElementById('mail1').style.color='#0066FF';
		document.getElementById('mail2').style.color='#000';
		document.getElementById('mail3').style.color='#000';
		document.getElementById('text1').style.display="block";
		document.getElementById('text2').style.display="none";
		document.getElementById('text3').style.display="none";
		selected = "mail1";
	});
	
	$("#mail2").click(function(){ //second email
		resetoptions();
		document.getElementById('mail1').style.color='#000';
		document.getElementById('mail2').style.color='#0066FF';
		document.getElementById('mail3').style.color='#000';
		document.getElementById('text1').style.display="none";
		document.getElementById('text2').style.display="block";
		document.getElementById('text3').style.display="none";
		selected = "mail2";
	});
	
	$("#mail3").click(function(){ //third email
		resetoptions();
		document.getElementById('mail1').style.color='#000';
		document.getElementById('mail2').style.color='#000';
		document.getElementById('mail3').style.color='#0066FF';
		document.getElementById('text1').style.display="none";
		document.getElementById('text2').style.display="none";
		document.getElementById('text3').style.display="block";
		selected = "mail3";
	});
	
	$("#delete").click(function(){ //delete
		if (selected == "mail1") {
			$( ".ui-widget-header" ).css( "background", "#33CC33" );
			$( "#dialog-correct1" ).dialog( "open" );
			document.getElementById('mail1').style.display='none';
			document.getElementById('text1').style.display="none";
			selected = "mail2";
			showJohn();
		}else if (selected == "mail3") {
			$( ".ui-widget-header" ).css( "background", "#33CC33" );
			$( "#dialog-correct2" ).dialog( "open" );
			document.getElementById('mail3').style.display='none';
			document.getElementById('text3').style.display="none";
			selected = "mail2";
			showJohn();
		}
	});
	
	$("#reply").click(function(){ //reply
		if (selected == "mail1") {
			document.getElementById('txtreply').style.display="block";
			document.getElementById('text1').style.display="none";
			document.getElementById('options2').style.display="block";
			document.getElementById('options').style.display="none";
		}
	});
	
	$("#cancel").click(function(){ //cancel
		resetoptions();
		document.getElementById('mail1').style.color='#0066FF';
		document.getElementById('text1').style.display="block";
	});
	
	$("#send").click(function(){ //send
		$( ".ui-widget-header" ).css( "background", "#FF3333" );
		$( "#dialog-wrong1" ).dialog( "open" );
	});
	
	$("#link").click(function(){ //send
		$( ".ui-widget-header" ).css( "background", "#FF3333" );
		$( "#dialog-wrong2" ).dialog( "open" );
	});
});

$(function() {
	$("#dialog-correct1").dialog({
		autoOpen: false,
		dialogClass: "no-close",
		modal: true,
		buttons: {
			Ok: function() { $(this).dialog("close"); }
		}
	});
});

$(function() {
	$("#dialog-correct2").dialog({
		autoOpen: false,
		dialogClass: "no-close",
		modal: true,
		buttons: {
			Ok: function() { $(this).dialog("close"); }
		}
	});
});

$(function() {
	$("#dialog-wrong1").dialog({
		autoOpen: false,
		dialogClass: "no-close",
		modal: true,
		buttons: {
			Ok: function() { $(this).dialog("close"); }
		}
	});
});

$(function() {
	$("#dialog-wrong2").dialog({
		autoOpen: false,
		dialogClass: "no-close",
		modal: true,
		buttons: {
			Ok: function() { $(this).dialog("close"); }
		}
	});
});