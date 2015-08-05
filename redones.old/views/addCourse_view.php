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
    <script src="<?php echo base_url('assets/csstest/ckeditor/ckeditor.js'); ?>"></script>
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
			
                <ul class="nav navbar-nav side-nav ">
				<li class="side-user hidden-xs">
						<div class="photo">
						<img class="img-circle" alt="" src="<?php echo base_url('assets/img/batman.jpg'); ?>"></img>
						<p class="welcome">Logged in as</p>
						<p class="name"><?php echo $username;?></p>
						</div>
					</li>
					<li class="side-nav-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                    <li>
                        <a href="<?php echo site_url('home') ?>"><i class="fa fa-fw fa-home"></i>  Home</a>
                    </li>
                    
                   <li>
                        <a href="<?php echo site_url('home/mygrade') ?>"><i class="fa fa-fw fa-check-square"></i> My Grade</a>
                    </li>
                    
                    <li class="active">
                        <a href="<?php echo site_url('course') ?>"><i class="fa fa-fw fa-briefcase"></i>  Course </a>	
                    </li>
					<li>
                        <a href="<?php echo site_url('home/adminpage')?>"><i class="fa fa-fw fa-folder-open"></i>  Admin Page </a>	
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
                              Add new Course <small>GUYS</small>
                        </h1>
                        </div>
                </div>
				
			<div class="row">	
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Course Detail
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
										<div class="row">
										<div class="col-lg-6">
                                        <div class="form-group" >
                                            <label>Course Name</label>
                                            <input class="form-control">
                                            <p class="help-block">Must be filled</p>
											</div>
                                        </div>
										</div>
										<div class="form-group">
                                            <label>Insert the topic</label>
                                            <textarea name="editor1" id="editor1" rows="10" cols="80">
												This is my textarea to be replaced with CKEditor.
											</textarea>
											<script>
												// Replace the <textarea id="editor1"> with a CKEditor
												// instance, using default configuration.
												CKEDITOR.replace( 'editor1' );
											</script>
                                        </div>
                                         <div class="form-group">
										  <div class="panel panel-default">
											<div class="panel-heading">
												Add Quiz
											</div>
											<div class="panel-body quiz">
												
                                                <p> <label> Question 1: </label> 
												<input class="form-control" id="url_1">
												<label> Option a: <input class="form-control" id="url_1"> </label>
												<label> Option b: <input class="form-control" id="url_1"> </label>
												<label> Option c: <input class="form-control" id="url_1"> </label>
												<label> Option d: <input class="form-control" id="url_1"> </label></br>
												<label>Answer 1: </label>
												<label class="radio-inline_1">
													<input type="radio" name="optionsRadiosInline" id="options0" value="0" checked>a
												</label>
												<label class="radio-inline_1">
													<input type="radio" name="optionsRadiosInline" id="options1" value="1">b
												</label>
												<label class="radio-inline_1">
													<input type="radio" name="optionsRadiosInline" id="options2" value="2">c
												</label>
												<label class="radio-inline_1">
													<input type="radio" name="optionsRadiosInline" id="options3" value="3">d
												</label>
												</p>
												<p> <a href="#" id="add"> Add another Question </a> </p>
                                        </div>
										</div>
										</div>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                
                <!-- /.col-lg-12 -->
            </div>
            </div>
			
            </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   
	<script src="<?php echo base_url('assets/csstest/js/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/csstest/js/dash.js'); ?>"></script>

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
