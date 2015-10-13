<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>AusCert | Register</title>
	<!-- <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/notify.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/chosen.css'); ?>" />

	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/chosen.jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/notify.min.js'); ?>"></script>
</head>

<body>
<?php
if (empty(validation_errors())) {
} else {
	?>
	<div class="tooltip">
		<?php echo validation_errors(); ?>
	</div>
	<?php
}
?>
<?php
if (!empty($this->session->flashdata('register-error'))) {
	?>
	<script>
		$(function(){
			$.notifyBar({
				html: "<?php echo $this->session->flashdata('register-error'); ?>",
				cssClass: "error",
				delay: 3000,
				clickToClose: true,
				animationSpeed: "normal"
			});
		});
	</script>
	<?php
}
?>
<?php
$attributes = array(
	'id' => 'formRegister',
	'name' => 'formRegister',
	'class' => 'formRegister'
);
echo form_open('register/registerUsers', $attributes);
?>
<div class="content">

	<div class="title">Register</div>
	<input type="text" id="registerEmail" <?php echo form_error('registerEmail') ? 'class="errorMessage"' : '' ?> name="registerEmail" placeholder="<?php echo form_error('registerEmail') ? form_error('registerEmail') : 'Email Address' ?>" value="<?php echo set_value('registerEmail'); ?>">
	<input type="text" id="registerFName" <?php echo form_error('registerFName') ? 'class="errorMessage"' : '' ?>name="registerFName" placeholder="<?php echo form_error('registerFName') ? form_error('registerFName') : 'First Name' ?>" value="<?php echo set_value('registerFName'); ?>" style="width: 48%;float: left;">
	<input type="text" id="registerLName" <?php echo form_error('registerLName') ? 'class="errorMessage"' : '' ?>name="registerLName" placeholder="<?php echo form_error('registerLName') ? form_error('registerLName') : 'Last Name' ?>" value="<?php echo set_value('registerLName'); ?>" style="width: 48%;float: right;">
	<input type="password" id="registerPassword" <?php echo form_error('registerPassword') ? 'class="errorMessage"' : '' ?>name="registerPassword" placeholder="<?php echo form_error('registerPassword') ? form_error('registerPassword') : 'Password' ?>" style="width:48%;float: left;">
	<input type="password" id="registerRepeatPassword" <?php echo form_error('registerRepeatPassword') ? 'class="errorMessage"' : '' ?>name="registerRepeatPassword" placeholder="<?php echo form_error('registerRepeatPassword') ? form_error('registerRepeatPassword') : 'Confirm Password' ?>" style="width: 48%;float: right;">
	<input type="tel" id="registerContact" <?php echo form_error('registerContact') ? 'class="errorMessage"' : '' ?>name="registerContact" placeholder="<?php echo form_error('registerContact') ? form_error('registerContact') : 'Contact No.' ?>" value="<?php echo set_value('registerContact'); ?>">
	<select class="chosen-select" id="registerGroup" name="registerGroup[]" data-placeholder="Select Faculty" multiple>
		<option value="not_applicable">Not Applicable</option>
		<?php
		foreach ($groups as $group) {
			?>
			<option value="<?php echo $group->groupID; ?>"><?php echo $group->organisation; ?></option>
			<?php
		}
		?>
	</select>
	<button>Register</button>

	<div class="already">
		Already have an account? <a href="<?php echo base_url('login'); ?>">Login</a>
	</div>
</div>
<script>
	$(".chosen-select").chosen({
		no_results_text: "Oops, nothing found!",
		max_selected_options: 4
	});
</script>
</body>
</html>