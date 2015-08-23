<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Cyber Security online training system for a business context." />
	<meta name="author" content="Tartiner Studios" />
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" />

	<title>AusCert | Dashboard</title>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/sb-admin.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/sb-admin-rtl.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/quiz.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/jquery-ui.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/email.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/course.css'); ?>" rel="stylesheet" />

	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<!-- <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> -->
	<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/quiz.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/dash.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/course.js'); ?>"></script>

</head>

<body>
	<?php date_default_timezone_set("Australia/Brisbane"); ?>
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
						<img  src="<?php echo base_url('assets/img/uq_logo.png'); ?>" class="uq-logo" alt="UQ Logo">
					</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-user"></i>&emsp;<?php echo $username;?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#"><i class="fa fa-fw fa-user"></i>&emsp;Profile</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-fw fa-envelope"></i>&emsp;Inbox</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-fw fa-gear"></i>&emsp;Settings</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo site_url('logout') ?>">
										<i class="fa fa-fw fa-power-off"></i>&emsp;Log Out
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div id="sidebar-wrapper">
			<ul class="nav navbar-nav side-nav">
				<li class="side-user hidden-xs">
					<div class="photo">
						<img src="<?php echo base_url('assets/img/uq_logo.png'); ?>" class="uq-logo" alt="UQ Logo">
						<img class="img-circle" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>" alt="User Placeholder Image" /> 
						<p class="welcome">Logged in as</p>
						<p class="name"><?php echo $username;?></p>
							<!-- <a href="#" class="name" data-toggle="dropdown"><?php echo $username;?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#"><i class="fa fa-fw fa-user"></i>&emsp;Profile</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-fw fa-envelope"></i>&emsp;Inbox</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-fw fa-gear"></i>&emsp;Settings</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo site_url('home/logout') ?>"><i class="fa fa-fw fa-power-off"></i>&emsp;Log Out</a>
								</li>
							</ul> -->
						</div>
					</li>

					<li>
						<a id="pageHome" class="side-nav <?php echo $menu=='home' ? 'active' : '' ?>" href="<?php echo site_url('home'); ?>">
							<i class="fa fa-fw fa-home"></i>&emsp;Home
						</a>
					</li>
<!-- 					<li class="<?php if ($menu=="mygrade") { echo "active"; } ?>">
						<a class="side-nav" href="<?php echo site_url('home/mygrade') ?>"><i class="fa fa-fw fa-check-square"></i>&emsp;My Grade</a>
					</li> -->
					<li>
						<a id="pageCourse" class="side-nav <?php echo $menu=='course' ? 'active' : '' ?>" href="<?php echo site_url('course'); ?>">
							<i class="fa fa-fw fa-briefcase"></i>&emsp;Course
						</a>
					</li>
					<?php if ($usertype=="admin") { ?>
					<li>
						<a id="pageAdmin" class="side-nav <?php echo $menu=='admin' ? 'active' : '' ?>" href="<?php echo site_url('admin'); ?>">
							<i class="fa fa-fw fa-folder-open"></i>&emsp;Admin Page
						</a>	
					</li>
					<?php 
				} 
				?>
				<!-- <li>
					<a id="pageSettings" class="side-nav <?php echo $menu=='settings' ? 'active' : '' ?>" href="<?php echo site_url('settings'); ?>">
						<i class="fa fa-fw fa-gear"></i>&emsp;Settings
					</a>
				</li> -->
				<li>
					<a id="pageLogout" class="side-nav <?php echo $menu=='logout' ? 'active' : '' ?>" href="<?php echo site_url('logout'); ?>">
						<i class="fa fa-fw fa-power-off"></i>&emsp;Log Out
					</a>
				</li>
			</ul>
		</div>