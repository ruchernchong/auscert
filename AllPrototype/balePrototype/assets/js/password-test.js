function check_password(){
	var text = document.getElementById("search-bar").value;
	var result = zxcvbn(text);
	$('#entropy').html(result.entropy);
	$('#crack_time').html(result.crack_time + " seconds");
	$('#crack_time_display').html(result.crack_time_display);
	$('#score').html(result.score);
}