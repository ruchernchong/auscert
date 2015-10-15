<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Cyber Security online training system for a business context." />
	<meta name="author" content="Tartiner Studios" />
	<!-- <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" /> -->

	<title>AusCert | Dashboard</title>

	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/sb-admin.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/sb-admin-rtl.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/quiz.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/jquery-ui.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/email.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/course.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/notify.css'); ?>" rel="stylesheet" />

	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/quiz.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/course.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/notify.min.js'); ?>"></script>
</head>
<body>
<div id="loader"></div>
<div id="wrapper">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">
					<img src="<?php echo base_url('assets/img/uq_logo.png'); ?>" class="uq-logo" alt="UQ Logo">
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="v-divider">
						<span class="navbar-brand auscert-logo">&emsp;<b>AusCERT</b></span>
					</li>
					<li class="v-divider">
						<span class="navbar-brand" id="tartiner-logo">&emsp;Tartiner Studios</span>
					</li>
					<!-- <li><a class="navbar-brand">AusCERT</a></li> -->
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li <?php echo $menu=='home' ? 'class="active"' : '' ?>>
						<a id="pageHome" href="<?php echo site_url('home'); ?>">
							<i class="fa fa-fw fa-home"></i>&nbsp;Home
						</a>
					</li>
					<?php if ($usertype=="admin") { ?>
						<li <?php echo $menu=='admin' ? 'class="active"' : '' ?>>
							<a id="pageAdmin" href="<?php echo site_url('admin'); ?>">
								<i class="fa fa-fw fa-folder-open"></i>&nbsp;Admin
							</a>
						</li>
						<?php
					}
					?>
					<li <?php echo $menu=='account' ? 'class="active"' : '' ?>>
						<a id="pageSettings" href="<?php echo site_url('account'); ?>">
							<i class="fa fa-fw fa-gear"></i>&nbsp;My Account
						</a>
					</li>
					<li <?php echo $menu=='logout' ? 'clss="active"' : '' ?>>
						<a id="pageLogout" href="<?php echo site_url('logout'); ?>">
							<i class="fa fa-fw fa-power-off"></i>&nbsp;Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>