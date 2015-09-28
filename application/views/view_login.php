<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>AusCert | Login</title>
	<!-- <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.min.css'); ?>" />

	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-select.min.js'); ?>"></script>
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
<!--
<div id="formModal">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#login" data-toggle="tab">Login</a></li>
		<li><a href="#register" data-toggle="tab">Register</a></li>
	</ul>

	<div class="tab-pane fade" id="register">
		<?php
		$attributes = array(
			'id' => 'formRegister',
			'name' => 'formRegister',
			'class' => 'formRegister'
		);
		echo form_open('register/registerUsers', $attributes);
		?>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
			<input type="text" id="registerUsername" name="registerUsername" placeholder="Username" class="form-control text-input" value="<?php echo set_value('registerUsername'); ?>">
		</div>
		<span class="errorMessage"><?php echo form_error('registerUsername'); ?></span>

		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
			<input type="password" id="registerPassword" name="registerPassword" placeholder="Password" class="form-control text-input">
		</div>
		<span class="errorMessage"><?php echo form_error('registerPassword'); ?></span>

		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
			<input type="password" id="registerRepeatPassword" name="registerRepeatPassword" placeholder="Confirm Password" class="form-control text-input">
		</div>
		<span class="errorMessage"><?php echo form_error('registerRepeatPassword'); ?></span>

		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-group fa-fw"></i></span>
			<select class="selectpicker form-control text-input" multiple data-max-options="4" data-live-search="true" data-selected-text-format="count>2" title="Select Faculty" id="registerGroup" name="registerGroup[]">
				<option value="not_applicable">Not Applicable</option>
				<?php
				foreach ($groups as $group) {
					?>
					<option value="<?php echo $group->groupID ?>"><?php echo $group->organisation ?></option>
					<?php
				}
				?>
			</select>
		</div>
		<span class="errorMessage"><?php echo form_error('registerFaculty'); ?></span>

		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
			<input type="text" id="registerEmail" name="registerEmail" placeholder="Email Address" class="form-control text-input" value="<?php echo set_value('registerEmail'); ?>">
		</div>
		<span class="errorMessage"><?php echo form_error('registerEmail'); ?></span>

		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
			<input type="tel" id="registerContact" name="registerContact" placeholder="Contact No." class="form-control text-input" value="<?php echo set_value('registerContact'); ?>">
		</div>
		<span class="errorMessage"><?php echo form_error('registerContact'); ?></span>

		<div class="form-group">
			<button class="btn-UQ">Register</button>
		</div>
		</form>
	</div>
</div>
-->
<script>
	$('.selectpicker').selectpicker({
		iconBase: 'fa',
		tickIcon: 'fa-check'
	});
</script>
</body>
</html>