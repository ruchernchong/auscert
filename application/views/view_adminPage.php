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
				Last modified: <i class="fa fa-clock-o"></i>&emsp;<?php echo $courseLastEdited[0]->courseName . "; " . $courseLastEdited[0]->lastEdited; ?>

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
										<thead>
											<tr>
												<th>Username</th>
												<th>User Type</th>
												<th>Email Address</th>
												<th>Contact No.</th>
											</tr>
										</thead>
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
									<thead>
										<th>Course List</th>
										<th>Last Edited</th>
										<th>Status</th>
										<th>Actions</th>
									</thead>
									<tbody>
										<?php foreach ($courses as $course) { ?>
										<tr>
											<td><a href="<?php echo site_url('learning?courseID=' . $course->courseID); ?>"><?php echo $course->courseName; ?></a></td>
											<td>Last edit: <?php echo empty($course->lastEdited) ? "None" : $course->lastEdited; ?></td>

											<td>
												<!-- <a href="<?php echo site_url('')?>" class="btn btn-sm btn-default">
													<i class="fa fa-check-square-o"></i>&emsp;Active
												</a> -->
												<!-- Prevents redirect to Login page -->
												<a class="btn btn-sm btn-default courseActive">
													<i class="fa fa-check-square-o"></i>&emsp;Active
												</a>
											</td>

											<td class="project-actions">
												<a href="<?php echo site_url('edits?courseID=' . $course->courseID); ?>" class="btn btn-sm btn-success">
													<i class="fa fa-pencil"></i>&emsp;Edit
												</a>
												&nbsp;
												<a href="<?php echo site_url('admin/analysis?cid=' . $course->courseID); ?>" class="btn btn-sm btn-primary">
													<i class="fa fa-bar-chart-o"></i>&emsp;Course Analytics
												</a>
												&nbsp;
												<a href="<?php echo site_url('admin/dropCourse?id=' . $course->courseID); ?>" class="btn btn-sm btn-danger">
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
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});

$('.courseActive').click(function(e) {
	// e.preventDefault();
	$(this).find('i').toggleClass('fa-check-square-o fa-square-o');
});

$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	$('#pageAdmin').removeAttr('href');
});
</script>
</body>
</html>