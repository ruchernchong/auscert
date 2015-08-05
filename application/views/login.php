<html>
<head>
	<meta charset="UTF-8">
	<title>My Place Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/my.css'); ?>" /> 
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body class="login_bg">
	<div class="uq-login">
		<div class="uq-logo"></div>
		<form method="post" class="login_form effect7" action='Login/Check_Login' name='Check_Login'>
			<?php
			$attr =  array('class' => 'login_form effect7');
			//echo form_open('Login/check_login',$attr);?>
			<div class="form-group">
				<input type="text" id="username" class="text-input" name="username" />
				<label class="login_icon icon-person"></label>
			</div>
			<div class="form-group">
				<input type="password" id="password" class="text-input" name="password" />
				<label class="login_icon icon-lock"></label>
			</div>
			<div class="form-group"> 
				<?php 
				/*
				if (isset($err)&&($err)) {
				echo '<span class="err_msg">Incorrect username/password</span>';
			}
			*/
			?>
		</div>
		<div class="form-group">
			<input type="submit" id="submit" value="Log In" name="submit" class="btn btn-uq"/>
		</div>
		<?php //echo form_close();?>
	</form>
</div>
</body>
</html>


