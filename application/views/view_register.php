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
<div class="loader"></div>
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
	<!--	<div class="on-focus">-->
	<input type="text" id="registerEmail" <?php echo form_error('registerEmail') ? 'class="errorMessage"' : (!empty(form_error('registerEmail') ? '' : 'class="successMessage"')) ?> name="registerEmail" placeholder="Email Address" value="<?php echo set_value('registerEmail'); ?>">
	<!--	</div>-->
	<!--			<div class="tooltip">--><?php //echo form_error('registerEmail'); ?><!--</div>-->
	<!--	</div>-->
	<!--	<div class="on-focus">-->
	<input type="text" id="registerFName" <?php echo form_error('registerFName') ? 'class="errorMessage"' : (!empty(form_error('registerFName') ? '' :'class="successMessage"')) ?> name="registerFName" placeholder="First Name" value="<?php echo set_value('registerFName'); ?>" style="width: 48%;float: left;">
	<!--	<div class="tooltip">--><?php //echo form_error('registerFName'); ?><!--</div>-->
	<!--	</div>-->
	<!--	<div class="on-focus">-->
	<input type="text" id="registerLName" <?php echo form_error('registerLName') ? 'class="errorMessage"' : (!empty(form_error('registerLName') ? '' :'class="successMessage"')) ?> name="registerLName" placeholder="Last Name" value="<?php echo set_value('registerLName'); ?>" style="width: 48%;float: right;">
	<!--	<div class="tooltip">--><?php //echo form_error('registerLName'); ?><!--</div>-->
	<!--	</div>-->
	<!--	<div class="on-focus">-->
	<input type="password" id="registerPassword" <?php echo form_error('registerPassword') ? 'class="errorMessage"' : (!empty(form_error('registerPassword') ? '' : 'class="successMessage"')) ?> name="registerPassword" placeholder="Password" style="width:48%;float: left;">
	<!--	<div class="tooltip">--><?php //echo form_error('registerPassword'); ?><!--</div>-->
	<!--	</div>-->
	<!--	<div class="on-focus">-->
	<input type="password" id="registerRepeatPassword" name="registerRepeatPassword" placeholder="Confirm Password" style="width: 48%;float: right;">
	<!--	<div class="tooltip">--><?php //echo form_error('registerRepeatPassword'); ?><!--</div>-->
	<!--	</div>-->
	<!--	<div class="on-focus">-->
	<input type="tel" id="registerContact" <?php echo form_error('registerContact') ? 'class="errorMessage"' : (!empty(form_error('registerContact') ? '' :'class="successMessage"')) ?> name="registerContact" placeholder="Contact No." value="<?php echo set_value('registerContact'); ?>">
	<!--	<div class="tooltip">--><?php //echo form_error('registerContact'); ?><!--</div>-->
	<!--	</div>-->
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

	$(window).load(function() {
		// Animate loader off screen
		$(".loader").fadeOut("slow");;
	});
</script>
</body>
</html>