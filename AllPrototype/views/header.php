<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>dashboardv1</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/csstest/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/csstest/css/sb-admin.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/csstest/css/sb-admin-rtl.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/csstest/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <div><img src="<?php echo base_url('assets/img/uq_logo.png'); ?>" class="uq-logo"></div>
				<div id="icon1"><a href="#menu-toggle"  id="menu-toggle"><i class="fa fa-fw fa-navicon fa-2x"></i></a></div>
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
            
            <div  id="sidebar-wrapper">
			
                <ul class="nav navbar-nav side-nav">
					<li class="side-user hidden-xs">
						<div class="photo">
						<img class="img-circle" alt="" src="<?php echo base_url('assets/img/batman.jpg'); ?>"></img>
						<p class="welcome">Logged in as</p>
						<p class="name"><?php echo $username;?></p>
						</div>
					</li>
					<!--<li class="side-nav-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            
                        </li>
						--><!-- /input-group -->
                    <li>
                        <a href="<?php echo site_url('home') ?>"><i class="fa fa-fw fa-home"></i>  Home</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('home/mygrade') ?>"><i class="fa fa-fw fa-check-square"></i> My Grade</a>
                    </li>
            
                    <li>
                        <a href="<?php echo site_url('course') ?>"><i class="fa fa-fw fa-briefcase"></i>  Course </a>
                    </li>
					<li>
                        <a href="<?php echo site_url('home/adminpage')?>"><i class="fa fa-fw fa-folder-open"></i>  Admin Page </a>	
                    </li>
                </ul>
           
           </div>
        </nav>