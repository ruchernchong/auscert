<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Place Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" /> -->
	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" />
</head>

<body class="login_bg">
	<div class="uq-login">
		<div class="uq-logo"></div>
		<form method="post" class="login_form effect7" action='login/validateLogin' name='Check_Login'>
			<?php
			$attr = array('class' => 'login_form effect7');
			?>
			<div class="form-group">
				<label for="username" class="login_icon icon-person"></label>
				<input type="text" id="username" name="username" class="text-input" />
			</div>
			<div class="form-group">
				<label for="password" class="login_icon icon-lock"></label>
				<input type="password" id="password" name="password" class="text-input" />
			</div>
			<div class="form-group">
				<input type="submit" id="submit" value="Log In" name="submit" class="btn btn-uq" />
			</div>
		</form>
	</div>
</body>
</html>