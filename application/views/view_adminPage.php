<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Page</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<a href="<?php echo site_url('addCourse') ?>" class="btn btn-primary">Create new course</a>&emsp;
				<!-- <div class="ibox-content"> -->
				<!-- <span class="text-muted pull-right"> -->
				Last modified: <i class="fa fa-clock-o"></i>&emsp;<?php echo $courseLastEdited[0]->courseName . "; " . $courseLastEdited[0]->lastEdited; ?>
				<!-- </span> -->

				<h2>Report</h2>
				<div class="input-group">
					<input type="text" placeholder="Search client" class="input form-control">
					<span class="input-group-btn">
						<button type="button" class="btn btn btn-primary">
							<i class="fa fa-search"></i>&emsp;Search</button>
						</span>
					</div>
					<div class="clients-list">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#tab-members"><i class="fa fa-user"></i>&emsp;Members</a>
							</li>
							<li>
								<a data-toggle="tab" href="#tab-courses"><i class="fa fa-briefcase"></i>&emsp;Courses</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="tab-members" class="tab-pane fade in active">
								<div class="table-responsive">
									<table class="table table-striped table-hover">
										<tbody>
											<?php foreach ($users as $user) { ?>
											<tr>
												<td class="client-avatar">
													<img alt="image" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>">&emsp;<a data-toggle="tab" href="#<?php echo $user->username; ?>" class="client-link"><?php echo $user->username; ?></a>
												</td>
												<td>
													<span data-toggle="tooltip" title="Any suggestion what would you prefer for this? Right now I am using 'userType' from the database."><?php echo $user->userType; ?></span>
												</td>
												<td>
													<i class="fa fa-envelope"></i>&emsp;<a href="mailto:<?php echo $user->email; ?>"><?php echo $user->email; ?></a>
												</td>
												<td>
													<i class="fa fa-phone"></i>&emsp;<a href="tel:<?php echo $user->contact; ?>"><?php echo $user->contact; ?></a>
												</td>
												<!-- <td class="client-status">
													<span class="label label-success" data-toggle="tooltip" title="I have no idea what is this.">Complete All Task</span>
												</td> -->
											</tr>
											<?php 
										}
										?>
									</tbody>
								</table>
							</div>
						</div>

						<div id="tab-courses" class="tab-pane fade">
							<div class="table-responsive">
								<table class="table table-hover">
									<tbody>
										<?php foreach ($courses as $course) {?>
										<tr>
											<td><a href="<?php echo site_url('learning?courseID=' . $course->courseID); ?>"><?php echo $course->courseName; ?></a></td>
											<td>Last edit: <?php echo empty($course->lastEdited) ? "None" : $course->lastEdited; ?></td>

											<td class="project-actions">
												<a href="<?php echo site_url(sprintf('edits?courseID=%d', $course->courseID)); ?>" class="btn btn-sm btn-success">
													<i class="fa fa-pencil"></i>&emsp;Edit
												</a>
												&nbsp;
												<a href="admin/dropCourse?id=<?php echo $course->courseID; ?>" class="btn btn-sm btn-danger">
													<i class="fa fa-trash"></i>&emsp;Remove
												</a>
											</td>
										</tr>
										<?php 
									} 
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- </div> -->
		</div>
	</div>
</div>
</div>
</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});

$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	$('#pageAdmin').removeAttr('href');
});
</script>
</body>
</html>