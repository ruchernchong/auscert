<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Cyber Security online training system for a business context." />
	<meta name="author" content="Tartiner Studios" />
	<meta name="google-site-verification" content="1LBGW060DUsPKhNgB2y34EQATnRahk9D3F9vR5VyFaI" />
	<title>AusCert | Login</title>
	<!-- <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/notify.css'); ?>" />

	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/notify.min.js'); ?>"></script>
</head>

<body>
<div class="loader"></div>
<?php
if (!empty($this->session->flashdata('register-success'))) {
	?>
	<script>
		$(function(){
			$.notifyBar({
				html: "<?php echo $this->session->flashdata('register-success'); ?>",
				cssClass: "success",
				delay: 86400,
				closeOnClick: true,
				animationSpeed: "normal"
			});
		});
	</script>
	<?php
}
?>
<?php
if (!empty($this->session->flashdata('login-error'))) {
	?>
	<script>
		$(function() {
			$.notifyBar({
				html: "<?php echo $this->session->flashdata('login-error'); ?>",
				cssClass: "error",
				delay: 3000,
				clickToClose: true,
				animationSpeed: "normal"
			});
		});
	</script>
<?php
} else if (!empty($this->session->flashdata('login-success'))) {
?>
	<script>
		$(function() {
			$.notifyBar({
				html: "<?php echo $this->session->flashdata('login-success'); ?>",
				cssClass: "success",
				delay: 3000,
				animationSpeed: "normal"
			});
		});
	</script>
	<?php
}
?>
<?php
if (!empty($this->session->flashdata('email-verified'))) {
	?>
	<script>
		$(function() {
			$.notifyBar({
				html: "<?php echo $this->session->flashdata('email-verified'); ?>",
				cssClass: "success",
				delay: 86400,
				closeOnClick: true,
				animationSpeed: "normal"
			});
		});
	</script>
	<?php
}
?>
<?php
if (!empty($this->session->flashdata('email-not-verified'))) {
	?>
	<script>
		$(function() {
			$.notifyBar({
				html: "<?php echo $this->session->flashdata('email-not-verified'); ?>",
				cssClass: "error",
				delay: 86400,
				closeOnClick: true,
				animationSpeed: "normal"
			});
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
	<button>Login</button>
	<div class="social">
		<span>Trouble Signing in?</span>
	</div>
	<div class="not-already">
		<p>
			Do not have an account? <a href="<?php echo base_url('register'); ?>">Register</a>
		</p>
	</div>
	<div class="forget-password">
		<p>
			Forget Password? <a href="<?php echo base_url('forgetPassword'); ?>">Reset Password</a>
		</p>
	</div>
</div>
</form>
<script>
	$(window).load(function() {
		// Animate loader off screen
		$(".loader").fadeOut("slow");;
	});
</script>
</body>
</html>