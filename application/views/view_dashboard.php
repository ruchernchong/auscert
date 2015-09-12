<?php
if (!empty($this->session->flashdata('denied'))) {
	?>
	<script>
	alert("<?php echo $this->session->flashdata('denied'); ?>");
</script>;
<?php
}
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard
					<small>Content Overview</small>
				</h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<div class="panel panel-course">
				<div class="panel panel-heading-course">
					<h3 class="panel-title">Course List</h3>
				</div>
				<div class="panel-course body">
					<div class="table-responsive">
						<table class="table table-hover">
							<?php
							if (!empty($userCourses)) {
								?>
								<thead>
									<th>Course Name</th>
								</thead>
								<tbody>
									<?php
									foreach ($userCourses as $userCourse) {
										?>
										<tr data-href="learning/?courseID=<?php echo $userCourse->courseID; ?>">
											<td>
												<?php echo $userCourse->courseName; ?>
											</td>
										</tr>
										<?php
									}
								} else {
									?>
									<div class="form-group">
										<label>There are no course(s) available for you.</label>
									</div>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="col-lg-6">
			<div class="circle-tile">
				<a href="#">
					<div class="circle-tile-heading orange">
						<i class="fa fa-bar-chart fa-fw fa-3x"></i>
					</div>
				</a>
				<div class="circle-tile-content orange">
					<div class="circle-tile-description text-faded">
						Completed Courses
					</div>
					<div class="circle-tile-number text-faded">
						<?php echo empty($NoOfUserCourses) ? "0" : $NoOfUserCourses ?>
					</div>
					<a class="circle-tile-footer" onclick="toggler('courseList', 'availableCourses', 'availableGroups');">More Info&nbsp;
						<i class="fa fa-chevron-circle-right"></i>
					</a>
				</div>
			</div>
		</div> -->
		<!-- <div class="col-lg-6">
			<div class="circle-tile">
				<a href="#">
					<div class="circle-tile-heading green">
						<i class="fa fa-search fa-fw fa-3x"></i>
					</div>
				</a>
				<div class="circle-tile-content green">
					<div class="circle-tile-description text-faded">
						Availabe Courses to be Completed
					</div>
					<div class="circle-tile-number text-faded">
						<?php echo empty($count_coursesAvail) ? "0" : $count_coursesAvail ?>
					</div>
						<a class="circle-tile-footer" onclick="toggler('availableCourses', 'courseList', 'availableGroups');">More Info&nbsp;
							<i class="fa fa-chevron-circle-right"></i>
						</a>
					</div>
				</div>
			</div> -->
			<div class="col-lg-4">
				<div class="panel panel-completed">
					<div class="panel panel-heading-completed">
						<h3 class="panel-title">Completed Courses</h3>
					</div>
					<div class="panel-completed body">
						<div class="table-responsive">
							<table class="table table-hover">
								<?php 
								if (!empty($completedUserCourses)) {
									?>
									<thead>
										<th>Course Name</th>
										<th>Mark</th>
										<th>Pass/Fail</th>
									</thead>
									<tbody>
										<?php
										foreach ($completedUserCourses as $completedUserCourse) {
											?>
											<tr data-href="learning/?courseID=<?php echo $completedUserCourse->courseID; ?>">
												<td>
													<?php echo !empty($completedUserCourse) ? $completedUserCourse->courseName : 'You do not have any completed course.' ?>
												</td>
												<td>
													<small>
														<i class="fa fa-line-chart"></i>&nbsp;
														<?php echo (!empty($completedUserCourse->grading)) ? $completedUserCourse->grading : '0' ?>/100
													</small>
												</td>
												<td>
													<?php 
													if ($completedUserCourse->grading > 50) {
														?>
														<p class="btn btn-success pull-right disabled">Pass</p>
														<?php
													} else {
														?>
														<p class="btn btn-danger pull-right disabled">Fail</p>
														<?php
													}
													?>
												</td>
											</tr>
								<!-- <div class="form-group" data-href="learning/?courseID=<?php echo $completedUserCourse->courseID; ?>">
									<span class="courseLink">
										<?php echo $completedUserCourse->courseName; ?>

										<?php 
										if ($completedUserCourse->grading > 50) {
											?>
											<p class="btn btn-success pull-right disabled">Pass</p>
											<?php
										} else {
											?>
											<p class="btn btn-danger pull-right disabled">Fail</p>
											<?php
										}
										?>
									</span>
								</div> -->
								<?php
							}
						} else {
							?>
							<div class="form-group">
								<label>You do not have any completed course(s).</label>
							</div>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-4">
	<div class="panel panel-announcement">
		<div class="panel panel-heading-announcement">
			<h3 class="panel-title">Announcement</h3>
		</div>
		<div class="panel-announcement body">
			<div class="announcement center">
				<ul>
					<li>
						<img class="img-circle" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>" alt="User Placeholder Image" />
					</li>
					<li>
						<h4>
							Logged in as <i><?php echo $username; ?></i>
						</h4>
						<hr />
						<!-- <h4>
							<b><?php echo date("F"); ?></b>
						</h4>
						<h3>
							<b><?php echo date("d"); ?></b>
						</h3> -->
						<!-- <hr /> -->
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- <div class="col-lg-4 col-sm-6">
				<div class="circle-tile">
					<a href="#">
						<div class="circle-tile-heading blue">
							<i class="fa fa-group fa-fw fa-3x"></i>
						</div>
					</a>
					<div class="circle-tile-content blue">
						<div class="circle-tile-description text-faded">
							Groups Available
						</div>
						<div class="circle-tile-number text-faded">
							<?php echo empty($NoOfGroups) ? "0" : $NoOfGroups ?>
						</div>
						<a class="circle-tile-footer" onclick="toggler('availableGroups', 'courseList', 'availableCourses');">More Info&nbsp;
							<i class="fa fa-chevron-circle-right"></i>
						</a>
					</div>
				</div>
			</div> -->
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-progress">
					<div class="panel panel-heading-progress">
						<h3 class="panel-title">Course Progress</h3>
					</div>

					<div class="panel-progress body">
						<div class="table-responsive">
							<table class="table table-hover">
								<?php 
								if (!empty($userCourses[0]->completion)) {
									?>
									<thead>
										<th>Status</th>
										<th>Course Name</th>
										<th>Progress</th>
									</thead>
									<tbody>
										<?php
										foreach ($userCourses as $userCourse) {
											?>
											<tr data-href="<?php echo site_url('learning?courseID=' . $userCourse->courseID); ?>">
												<td>
													<?php
													if ($userCourse->completion == 100) {
														?>
														<span class="label label-success">Completed</span>
														<?php
													} else if ($userCourse->completion == 0) {
														?>
														<span class="label label-danger">Not Started</span>
														<?php
													} else if ($userCourse->completion < 0 || $userCourse->completion > 100) {
														?>
														<span class="label label-info">WTF?</span>
														<?php
													} else {
														?>
														<span class="label label-warning">In Progress</span>
														<?php 
													}
													?>
												</td>
												<td>
													<?php echo $userCourse->courseName; ?>
												</td>
												<td width="50%">
													<div class="progress">
														<div style="width: <?php echo $userCourse->completion; ?>%" class="progress-bar"><?php echo $userCourse->completion; ?>%</div>
													</div>
												</td>
											</tr>
											<?php
										}
									} else {
										?>
										<div class="form-group">
											<label>You do not have any course(s) enrolled.</label>
										</div>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="row">
			<div class="col-lg-12" id="courseList">
				<div class="tile checklist-tile orange">
					<h4 class="moreInfo-title">Courses Enrolled</h4>
					<div class="checklist">
						<?php 
						if (empty($user_courses[0]->courseName)) {
							?>
							<div class="form-group">
								<label>You have enrolled in 0 courses.</label>
							</div>
							<?php
						} else {
							foreach ($user_courses as $usercourse) {
								?>
								<div class="form-group">
									<a href="learning/?courseID=<?php echo $usercourse->courseID; ?>" class="courseLink">
										<label>
											<i class="fa fa-tasks"></i>&emsp;<?php echo $usercourse->courseName; ?>
										</label>
									</a>
									<a class="btn btn-danger pull-right" href="home/dropCourse?id=<?php echo $usercourse->courseID; ?>">Drop Course</a>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-12" id="availableCourses">
				<div class="tile checklist-tile green">
					<h4 class="moreInfo-title">Available Courses</h4>
					<div class="checklist">
						<?php
						if (empty($courses[0]->courseName)) {
							?>
							<div class="form-group">
								<label>There are 0 courses available.</label>
							</div>
							<?php
						} else {
							?>
							<?php
							foreach ($coursesAvail as $courseAvail) {
								?>
								<div class="form-group">
									<a href="learning?courseID=<?php echo $courseAvail->courseID; ?>" class="courseLink">
										<label><?php echo $courseAvail->courseName; ?></label>
									</a>
									<p>&emsp;<?php echo $courseAvail->description; ?></p>
									&emsp;&emsp;&emsp;<label><i class="fa fa-list"></i>&nbsp;Category: <?php echo $courseAvail->category; ?></label>
									&emsp;<label><i class="fa fa-users"></i>&nbsp;Creator: <?php echo $courseAvail->creator; ?></label>
									<a class="btn btn-warning pull-right" data-href="home/EnrolToCourse?id=<?php echo $courseAvail->courseID; ?>" data-toggle="modal" data-target="#confirmEnrol">Enrol to Course</a>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="modal fade" id="confirmEnrol" tabindex="-1" role="dialog" aria-hidden="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							<a class="btn btn-success btn-ok">Confirm</a>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
</div>
<script>
// function toggler(toggle, hideOne, hideTwo) {
// 	$("#" + toggle).toggle("slow");
// 	$("#" + hideOne).hide("slow")
// 	$("#" + hideTwo).hide("slow")
// }

$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	$('#pageHome').removeAttr('href');
	// $('#confirmEnrol').on('show.bs.modal', function(e) {
	// 	$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	// });
});
</script>
</body>
</html>