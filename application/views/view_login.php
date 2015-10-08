<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>AusCert | Login</title>
	<!-- <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" />

	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/notify.min.js'); ?>"></script>

	<meta name="google-site-verification" content="1LBGW060DUsPKhNgB2y34EQATnRahk9D3F9vR5VyFaI" />
</head>

<body>
<?php
if (!empty($this->session->flashdata('login-error'))) {
	?>
	<script>
		$.notify("<?php echo $this->session->flashdata('login-error'); ?>", {
			className: "error",
			clickToHide: true,
			autoHide: false,
			globalPosition:"bottom right"
		});
	</script>
<?php
} else if (!empty($this->session->flashdata('login-success'))) {
?>
	<script>
		$.notify("<?php echo $this->session->flashdata('login-success'); ?>", {
			className: "success",
			clickToHide: true,
			autoHide: false,
			globalPosition: "bottom right"
		});
	</script>
	<?php
}
?>

<?php
$attributes = array(
	'id' => 'formLogin',
	'name' => 'formLogin',
	'class' => 'formLogin'
);
echo form_open('login/validateLogin', $attributes);
?>
<div class="content">
	<div class="title">Login</div>
	<input type="text" id="loginEmail" name="loginEmail" placeholder="E-mail" />
	<input type="password" id="loginPassword" name="loginPassword" placeholder="Password" />
	<input type="checkbox" id="rememberMe" name="rememberMe" />
	<label for="rememberMe"></label><span>Remember Me</span>
	<button>Login</button>
	<!-- <div class="social"> <span>or sign up with social media</span></div>
    <div class="buttons">
        <button class="facebook"><i class="fa fa-facebook"></i>Facebook</button>
        <button class="twitter"><i class="fa fa-twitter"></i>Twitter</button>
        <button class="google"><i class="fa fa-google-plus"></i>Google</button>
    </div> -->
	<div class="not-already">
		Do not have an account? <a href="<?php echo base_url('register'); ?>">Register</a>
	</div>
</div>
</form>
</body>
</html>