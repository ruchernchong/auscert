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
						<a href="<?php echo site_url('addCourse') ?>" class="btn btn-lg btn-primary">Create new course</a>
					</div>
				</div>
				<div class="ibox-content">
					<span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>
					<h2>Report</h2>

					<div class="input-group">
						<input type="text" placeholder="Search client" class="input form-control">
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
													<td class="client-avatar"><img alt="image" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>"> </td>
													<td><a data-toggle="tab" href="#contact-1" class="client-link">DECO1</a></td>
													<td> Staff</td>
													<td class="contact-type"><i class="fa fa-envelope"> </i></td>
													<td> gravida@rbisit.com</td>
													<td class="client-status"><span class="label label-success">Complete All Task</span></td>
												</tr>

												<tr>
													<td class="client-avatar"><img alt="image" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>"> </td>
													<td><a data-toggle="tab" href="#contact-3" class="client-link">DECO2</a></td>
													<td>Staff</td>
													<td class="contact-type"><i class="fa fa-phone"> </i></td>
													<td> +432 955 908</td>
													<td class="client-status"><span class="label label-primary">Complete 1 Task</span></td>
												</tr>
												<tr>
													<td class="client-avatar"><a href=""><img alt="image" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>"></a> </td>
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
												<?php foreach ($lessons as $l) {?>
												<tr>
													<td><a href="<?php echo site_url('learning?lid='.$l->lessonID) ?>" class="client-link"><?php echo $l->lessonName; ?></a></td>
													<td>Last edit :15/06/2015</td>

													<td class="project-actions">
														<a href="<?php echo site_url('edits') ?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
														<a href="#" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Remove </a>
													</td>
												</tr>
												<?php 
											} 
											?>
												<!-- 
												<tr>
												<td><a data-toggle="tab" href="#company-2" class="client-link">Choosing Password</a></td>
												<td>Added :15/06/2015</td>

												<td class="project-actions">
												<a href="<?php echo site_url('edits') ?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
												<a href="#" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Remove </a>
												</td>
												</tr>
											-->
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
		<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
		<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
		</script>
	</body>
	</html>