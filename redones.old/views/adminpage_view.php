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
   
    <link href="<?php echo base_url('assets/csstest/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <div><img src="<?php echo base_url('assets/img/uq_logo.png'); ?>" class="uq-logo"></div>
				
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
                            
                        </li>--><!-- /input-group -->
                    <li>
                        <a href="<?php echo site_url('home') ?>"><i class="fa fa-fw fa-home"></i>  Home</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('home/mygrade') ?>"><i class="fa fa-fw fa-check-square"></i> My Grade</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('course') ?>"><i class="fa fa-fw fa-briefcase"></i>  Course </a>
                    </li>
					<li class="active">
                        <a href="<?php echo site_url('home/adminpage')?>"><i class="fa fa-fw fa-folder-open"></i> Admin Page </a>	
                    </li>
                </ul>
           
           </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
					<h1 class="page-header">
                            Admin Page <small>GUYS</small>
                        </h1>
                     
                        </div>
                </div>
				<div class="row">
                    
                         <div class="ibox">
						 <div class="ibox-title">
                            
                            <div class="ibox-tools">
                                <a href="<?php echo site_url('addcourse') ?>" class="btn btn-primary btn-xs">Create new course</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>
                            <h2>Report</h2>
                           
                            <div class="input-group">
                                <input type="text" placeholder="Search client " class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                </span>
                            </div>
                            <div class="clients-list">
                            <ul class="nav nav-tabs">
                                <span class="pull-right small text-muted">1406 Elements</span>
                                <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Members</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Courses</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="client-avatar"><img alt="image" src="<?php echo base_url('assets/img/batman.jpg'); ?>"> </td>
                                                    <td><a data-toggle="tab" href="#contact-1" class="client-link">DECO1</a></td>
                                                    <td> Staff</td>
                                                    <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                    <td> gravida@rbisit.com</td>
                                                    <td class="client-status"><span class="label label-success">Complete All Task</span></td>
                                                </tr>
                                               
                                                <tr>
                                                    <td class="client-avatar"><img alt="image" src="<?php echo base_url('assets/img/batman.jpg'); ?>"> </td>
                                                    <td><a data-toggle="tab" href="#contact-3" class="client-link">DECO2</a></td>
                                                    <td>Staff</td>
                                                    <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                    <td> +432 955 908</td>
                                                   <td class="client-status"><span class="label label-primary">Complete 1 Task</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><a href=""><img alt="image" src="<?php echo base_url('assets/img/batman.jpg'); ?>"></a> </td>
                                                    <td><a data-toggle="tab" href="#contact-4" class="client-link">DECO3</a></td>
                                                    <td>Member</td>
                                                    <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                    <td> +422 600 213</td>
                                                    <td class="client-status"><span class="label label-warning">Not Complete</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 318.866253321523px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                <tr>
                                                    <td><a href="<?php echo site_url('learning') ?>" class="client-link">Phising Email</a></td>
                                                    <td>Last edit :15/06/2015</td>
                                                    
                                                     <td class="project-actions">
                                            <a href="<?php echo site_url('edits') ?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Remove </a>
                                        </td>
													</tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link">Choosing Password</a></td>
                                                    <td>Added :15/06/2015</td>
                                                    
                                                    <td class="project-actions">
                                            <a href="<?php echo site_url('edits') ?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Remove </a>
                                        </td>
                                                </tr>
                                          
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                                </div>
                            </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/csstest/js/jquery.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/csstest/js/bootstrap.min.js'); ?>"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    

</body>

</html>
