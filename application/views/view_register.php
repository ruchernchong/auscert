<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>AusCert | Register</title>
	<!-- <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" />
	<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo base_url('assets/css/bootstrap.min.css'); ?><!--" />-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/chosen.css'); ?>" />

	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/chosen.jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/notify.min.js'); ?>"></script>
</head>

<body>
<?php echo validation_errors(); ?>
<?php
if (!empty($this->session->flashdata('register-error'))) {
	?>
	<script>
		$.notify("<?php echo $this->session->flashdata('register-error'); ?>", {
			className: "error",
			clickToHide: true,
			autoHide: false,
			globalPosition: "top right"
		});
	</script>
<?php
} else if (!empty($this->session->flashdata('register-success'))) {
?>
	<script>
		$.notify("<?php echo $this->session->flashdata('register-success'); ?>", {
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
	'id' => 'formRegister',
	'name' => 'formRegister',
	'class' => 'formRegister'
);
echo form_open('register/registerUsers', $attributes);
?>
<div class="content">

	<div class="title">Register</div>

	<input type="text" id="registerEmail" name="registerEmail" placeholder="Email Address" value="<?php echo set_value('registerEmail'); ?>">
	<!--		<span class="errorMessage">--><?php //echo form_error('registerEmail'); ?><!--</span>-->

	<input type="text" id="registerFName" name="registerFName" placeholder="Name" value="<?php echo set_value('registerFName'); ?>" style="width: 48%;float: left;">
	<input type="text" id="registerLName" name="registerLName" placeholder="Last Name" value="<?php echo set_value('registerLName'); ?>" style="width: 48%;float: right;">
	<!--		<span class="errorMessage">--><?php //echo form_error('registerFName'); ?><!--</span>-->
	<!--		<span class="errorMessage">--><?php //echo form_error('registerLName'); ?><!--</span>-->

	<input type="password" id="registerPassword" name="registerPassword" placeholder="Password" style="width:48%;float: left;">
	<input type="password" id="registerRepeatPassword" name="registerRepeatPassword" placeholder="Confirm Password" style="width: 48%;float: right;">
	<!--		<span class="errorMessage">--><?php //echo form_error('registerPassword'); ?><!--</span>-->

	<!--		<span class="errorMessage">--><?php //echo form_error('registerRepeatPassword'); ?><!--</span>-->

	<input type="tel" id="registerContact" name="registerContact" placeholder="Contact No." value="<?php echo set_value('registerContact'); ?>">
	<!--		<span class="errorMessage">--><?php //echo form_error('registerContact'); ?><!--</span>-->

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
	<!--		<span class="errorMessage">--><?php //echo form_error('registerGroup'); ?><!--</span>-->

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