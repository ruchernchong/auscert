<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>AusCert | Dashboard</title>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sb-admin.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sb-admin-rtl.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/quiz.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/jquery-ui.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/email.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

	<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/quiz.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/dash.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/email.js'); ?>"></script>
</head>

<body>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<img src="<?php echo base_url('assets/img/uq_logo.png'); ?>" class="uq-logo">
			</div>
			<!-- Top Menu Items -->
			<ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username;?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?php echo site_url('home/logout') ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			<div id="sidebar-wrapper">
				<ul class="nav navbar-nav side-nav">
					<li class="side-user hidden-xs">
						<div class="photo">
							<!-- <img class="img-circle" alt="" src="<?php echo base_url('assets/img/batman.jpg'); ?>" /> -->
							<img class="img-circle" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>" />
							<p class="welcome">Logged in as</p>
							<p class="name"><?php echo $username;?></p>
						</div>
					</li>
					<!--
					<li class="side-nav-search">
					<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button">
					<i class="fa fa-search"></i>
					</button>
					</span>
					</div>
					</li>
				-->
				<li class="<?php if ($menu=="home") { echo "active"; } ?>">
					<a href="<?php echo site_url('home') ?>"><i class="fa fa-fw fa-home"></i> Home</a>
				</li>
				<li class="<?php if ($menu=="mygrade") { echo "active"; } ?>">
					<a href="<?php echo site_url('home/mygrade') ?>"><i class="fa fa-fw fa-check-square"></i> My Grade</a>
				</li>
				<li class="<?php if ($menu=="course") { echo "active"; } ?>">
					<a href="<?php echo site_url('course') ?>"><i class="fa fa-fw fa-briefcase"></i> Course </a>
				</li>
				<?php if ($username=="admin") { ?>
				<li class="<?php if ($menu=="admin") { echo "active"; } ?>">
					<a href="<?php echo site_url('home/admin')?>"><i class="fa fa-fw fa-folder-open"></i> Admin Page </a>	
				</li>
				<?php 
			} 
			?>
		</ul>
	</div>
</nav>