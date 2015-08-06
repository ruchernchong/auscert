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
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sb-admin.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sb-admin-rtl.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
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
				<li>
					<a href="<?php echo site_url('home') ?>"><i class="fa fa-fw fa-home"></i>  Home</a>
				</li>
				<li>
					<a href="<?php echo site_url('home/ann') ?>"><i class="fa fa-fw fa-exclamation"></i> Announcement</a>
				</li>
				<li>
					<a href="<?php echo site_url('home/mygrade') ?>"><i class="fa fa-fw fa-check-square"></i> My Grade</a>
				</li>
				<li class="active">
					<a href="<?php echo site_url('home/post') ?>"><i class="fa fa-fw fa-comments"></i>  Post</a>
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

	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Post <small>GUYS</small>
					</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar mailbox-topnav" role="navigation">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<a class="navbar-brand" href="mailbox.html"><i class="fa fa-inbox"></i> Inbox</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="mailbox-nav">
							<ul class="nav navbar-nav button-tooltips">
								<li class="checkall">
									<input id="selectall" data-toggle="tooltip" data-placement="bottom" title="Select All" type="checkbox">
								</li>
								<li class="message-actions">
									<div class="btn-group navbar-btn">
										<button type="button" class="btn btn-white" data-toggle="tooltip" data-placement="bottom" title="Archive"><i class="fa fa-archive"></i>
										</button>
										<button type="button" class="btn btn-white" data-toggle="tooltip" data-placement="bottom" title="Mark as Important"><i class="fa fa-exclamation-circle"></i>
										</button>
										<button type="button" class="btn btn-white" data-toggle="tooltip" data-placement="bottom" title="Trash"><i class="fa fa-trash-o"></i>
										</button>
									</div>
								</li>
								<li class="dropdown message-label">
									<button type="button" class="btn btn-white navbar-btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tag"></i>  <i class="fa fa-caret-down text-muted"></i>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#"><i class="fa fa-square text-green"></i> Purchase Orders</a>
										</li>
										<li><a href="#"><i class="fa fa-square text-orange"></i> Current Projects</a>
										</li>
										<li><a href="#"><i class="fa fa-square text-purple"></i> Work Groups</a>
										</li>
										<li><a href="#"><i class="fa fa-square text-blue"></i> Personal</a>
										</li>
										<li><a href="#"><i class="fa fa-square-o"></i> None</a>
										</li>
									</ul>
								</li>
							</ul>
							<form class="navbar-form navbar-right visible-lg" role="search">
								<div class="form-group">
									<input class="form-control" placeholder="Search Mail..." type="text">
								</div>
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
								</button>
							</form>
						</div>
					</nav>

					<div id="mailbox">

						<ul class="nav nav-pills nav-stacked mailbox-sidenav">
							<li><a class="btn btn-white" href="compose-message.html"><i class="fa fa-edit"></i> Compose Message</a>
							</li>
							<li class="nav-divider"></li>
							<li class="mailbox-menu-title text-muted">Folder</li>
							<li class="active"><a href="#">Inbox (15)</a>
							</li>
							<li><a href="#">Sent</a>
							</li>
							<li><a href="#">Drafts</a>
							</li>
							<li><a href="#">Spam</a>
							</li>
							<li><a href="#">Trash</a>
							</li>
							<li class="nav-divider"></li>
							<li class="mailbox-menu-title text-muted">Labels</li>
							<li><a href="#"><i class="fa fa-square text-green"></i> Purchase Orders</a>
							</li>
							<li><a href="#"><i class="fa fa-square text-orange"></i> Current Projects</a>
							</li>
							<li><a href="#"><i class="fa fa-square text-purple"></i> Work Groups</a>
							</li>
							<li><a href="#"><i class="fa fa-square text-blue"></i> Personal</a>
							</li>
							<li><a href="#"><i class="fa fa-plus"></i> Create New Label</a>
							</li>
						</ul>

						<div id="mailbox-wrapper">

							<div class="table-responsive mailbox-messages">
								<table class="table table-bordered table-striped table-hover">
									<tbody>
										<tr class="unread-message clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col">Jane Smith</td>
											<td class="msg-col">
												<span class="label green">Orders</span> Order Status Update: Order #231
												<span class="text-muted">- Hi again! I wanted to let you know that the order...</span>
											</td>
											<td class="date-col"><i class="fa fa-paperclip"></i> 1/1/14</td>
										</tr>
										<tr class="unread-message clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col">Roddy Auston</td>
											<td>
												<span class="label purple">Work</span> Thanks for the information!
												<span class="text-muted">- Thanks again for the info! If you need anything from...</span>
											</td>
											<td class="date-col">1/1/14</td>
										</tr>
										<tr class="unread-message clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col"><i class="fa fa-exclamation-circle text-orange"></i> Stacy Gibson</td>
											<td>
												<span class="label orange">Projects</span> Order number for new client
												<span class="text-muted">- Hey, what was the purchase order number for the...</span>
											</td>
											<td class="date-col">1/1/14</td>
										</tr>
										<tr class="unread-message clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col">Jeffery Cortez</td>
											<td>
												<span class="label blue">Personal</span> Check out this video.
												<span class="text-muted">- Check out this video I found the other day, it's...</span>
											</td>
											<td class="date-col"><i class="fa fa-paperclip"></i> 1/1/14</td>
										</tr>
										<tr class="clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col">Jane Smith</td>
											<td>
												<span class="label green">Orders</span> Order Status Update: Order #219
												<span class="text-muted">- This order has been filled and is ready to ship...</span>
											</td>
											<td class="date-col"><i class="fa fa-paperclip"></i> 1/1/14</td>
										</tr>
										<tr class="clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col">FlexCorp Marketing</td>
											<td>Monthly Newsletter from FlexCorp - This Month's Trends
												<span class="text-muted">- FlexCo has some great updates for you in this...</span>
											</td>
											<td class="date-col">1/1/14</td>
										</tr>
										<tr class="clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col">Jeffery Cortez</td>
											<td>
												<span class="label blue">Personal</span> FWD: Best Cat Videos of 2013
												<span class="text-muted">- These are some of the best cat videos I have ever...</span>
											</td>
											<td class="date-col">1/1/14</td>
										</tr>
										<tr class="clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col">Mom</td>
											<td>
												<span class="label blue">Personal</span> Is your phone on?
												<span class="text-muted">- I tried to call you this morning and your phone wasn't on. I know...</span>
											</td>
											<td class="date-col">1/1/14</td>
										</tr>
										<tr class="clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col"><i class="fa fa-warning text-red"></i> System Warning</td>
											<td>Server #4 Crashed
												<span class="text-muted">- This is an automated message notifying you that there is a problem with...</span>
											</td>
											<td class="date-col">1/1/14</td>
										</tr>
										<tr class="clickableRow">
											<td class="checkbox-col">
												<input class="selectedId" name="selectedId" type="checkbox">
											</td>
											<td class="from-col">System Report</td>
											<td>Daily Report for 12/31/13
												<span class="text-muted">- Daily traffic and user breakdown for 12/31/13. To view the report, open...</span>
											</td>
											<td class="date-col"><i class="fa fa-paperclip"></i> 12/31/13</td>
										</tr>
									</tbody>
								</table>
							</div>

							<ul class="list-inline pull-right">
								<li><strong>1-10 of 1,392</strong>
								</li>
								<li>
									<div class="btn-group">
										<button type="button" class="btn btn-white"><i class="fa fa-chevron-left"></i>
										</button>
										<button type="button" class="btn btn-white"><i class="fa fa-chevron-right"></i>
										</button>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- /.panel .chat-panel -->
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