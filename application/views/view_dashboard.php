<?php
if (!empty($this->session->flashdata('denied'))) {
	?>
	<script>
		$.notify("<?php echo $this->session->flashdata('denied'); ?>", {
			className: "error",
			globalPosition: 'bottom right'
		});
	</script>
	<?php
}
if (!empty($this->session->flashdata('welcome'))) {
	?>
	<script>
	</script>
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
							<tbody>
							<?php
							foreach ($userCourses as $userCourse) {
								?>
								<tr data-href="<?php echo site_url('learning/' . $userCourse->courseID); ?>">
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
								<tr data-href="<?php echo site_url('learning/' . $completedUserCourse->courseID); ?>">
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
									Logged in as <h3><i><?php echo $fname . " " . $lname; ?></i></h3>
								</h4>
								<hr />
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
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
								<tr data-href="<?php echo site_url('learning/' . $userCourse->courseID); ?>">
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
</div>
</div>
<script>
	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
		$('#pageHome').removeAttr('href');
	});
</script>
</body>
</html>