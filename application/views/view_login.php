<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>AusCert | Registration</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" />
	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" />
</head>

<body>
	<div id="formModal">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#login" data-toggle="tab">Login</a></li>
			<li><a href="#register" data-toggle="tab">Register</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane active in" id="login">
				<form name="formLogin" id="formLogin" class="formLogin" action="login/validateLogin" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
						<input type="text" id="loginUsername" name="loginUsername" placeholder="Username" class="form-control text-input">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
						<input type="password" id="loginPassword" name="loginPassword" placeholder="Password" class="form-control text-input">
					</div>

					<div class="form-group">
						<button class="btn-UQ">Login</button>
					</div>
				</form>
			</div>

			<div class="tab-pane fade" id="register">
				<form name="formRegister" id="formRegister" class="formRegister" action="register/registerUsers" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
						<input type="text" id="registerUsername" name="registerUsername" placeholder="Username" class="form-control text-input" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
						<input type="password" id="registerPassword" name="registerPassword" placeholder="Password" class="form-control text-input" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
						<input type="password" id="registerRepeatPassword" name="registerRepeatPassword" placeholder="Confirm Password" class="form-control text-input" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
						<input type="text" id="registerEmail" name="registerEmail" placeholder="Email Address" class="form-control text-input" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
						<input type="tel" id="registerContact" name="registerContact" placeholder="Contact No." class="form-control text-input" required>
					</div>

					<div class="form-group">
						<button class="btn-UQ">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>