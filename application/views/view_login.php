<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AusCert | Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" /> -->
	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" />
</head>

<body class="login_bg">
	<div class="uq-login">
		<div class="uq-logo"></div>
		<form name='formLogin' class="formLogin effect7" action='login/validateLogin' method="post">
			<div class="form-group">
				<label for="username" class="login_icon icon-person"></label>
				<input type="text" id="username" name="username" class="text-input" />
			</div>
			<div class="form-group">
				<label for="password" class="login_icon icon-lock"></label>
				<input type="password" id="password" name="password" class="text-input" />
			</div>
			<div class="form-group">
				<input type="submit" id="submit" name="submit" class="btn-uq" value="Log In"  />
			</div>
			<div class="form-group">
				<button type="button" class="btn-uq" id="btnRegister">Register</button>
			</div>
		</form>
	</div>
	<script>
	$("#btnRegister").click(function(e) {
		e.preventDefault();
		window.location.href = "register";
	});
	</script>
</body>
</html>