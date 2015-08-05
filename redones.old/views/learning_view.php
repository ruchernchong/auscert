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
	<link href="<?php echo base_url('assets/csstest/css/quiz.css'); ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/email.css'); ?>" rel="stylesheet">
   <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
   
   <script src="<?php echo base_url('assets/js/email.js'); ?>"></script>
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
                             $courseName <small>GUYS</small>
                        </h1>
                        </div>
                </div>
				
			<div class="row">
				<div class="col-lg-12">
               <div class="panel-group" id="accordion">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse"  href="#collapseOne">
						  How to $courseName
						</a>
					  </h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in">
					  <div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					  </div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse"  href="#collapseTwo">
						  Quiz
						</a>
					  </h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse">
					  <div class="panel-body">
						<div id='container'>
							<div id='title'>
								<h1>$courseName Quiz</h1>
							</div>
							<br/>
							<div id='quiz'></div>
							<div class='button btn btn-primary' id='next'><a href='#'>Next</a></div>
							<div class='button btn btn-primary' id='prev'><a href='#'>Prev</a></div>
							<div class='button btn btn-primary' id='start'> <a href='#'>Start Over</a></div>
							<!-- <button class='' id='next'>Next</a></button>
							<button class='' id='prev'>Prev</a></button>
							<button class='' id='start'> Start Over</a></button> -->
					</div>
		</div>
					</div>
				  </div>
					  <div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse"  href="#collapseThree">
							  Addition Task
							</a>
						  </h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse">
						  <div class="panel-body">
							<div id="header">
			<p>Your Email Client</p>
			<img src="images/dummy-pic.png" height="50"/>
		</div>
		<div id="sidebar">
			<h1>INBOX</h1>
			<ul id="one">
				<li><a class="selected">All</a></li>
				<li><a>Unread</a></li>
				<li><a>To me</a></li>
				<li><a>Flagged</a></li>
			</ul>
			<ul id="two">
				<a><li id="mail1">
					<p><strong>Sender:</strong> fishy_guy@scam.com</p>
					<p><strong>Subject:</strong> Hey, this is your friend.</p>
				</li></a>
				<a><li id="mail2">
					<p><strong>Sender:</strong> john_smith@gallifrey.com</p>
					<p><strong>Subject:</strong> Quick, the Universe is in need of saving!</p>
				</li></a>
			</ul>
		</div>
		<div id="content" class="content">
			<h1 id="title" class="content">This is an email</h1>
			<div id="options" class="content">
				<ul>
					<li><a>REPLY</a></li>
					<li><a>REPLY ALL</a></li>
					<li><a>FORWARD</a></li>
				</ul>
			</div>
			<div id="text1" class="email content">
				<p><strong>Sender:</strong> fishy_guy@scam.com</p>
				<p>Hey. I need you to send me your bank details right away. I am stranded in Mexico and you are the only person I can get help from. Please reply ASAP. I&#8217;m really in need of you.</p>
				<p>Thanks</p>
				<p>Definitely Your Friend</p>
			</div>
			<div id="text2"class="email content">
				<p><strong>Sender:</strong> john_smith@gallifrey.com</p>
				<p>Dear Companion,</p>
				<p>I've landed in the middle of nowhere and there somehow seems to be a war going on. If you're not busy, could you wait outside your apartment and I'll be with you in five minutes. Thanks. Oh, and keep your guard up.</p>
				<p>Geronimo!</p>
				<p>The Caretaker</p>
				<p>P.S. Don&#8217;t Blink</p>
			</div>
			<div id="delete" class="content"><a>DELETE</a></div>
		</div>
</div>
						</div>
					  </div>
					</div>
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
 <script src="<?php echo base_url('assets/csstest/js/quiz.js'); ?>"></script>
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
