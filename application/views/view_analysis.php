<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Course Analysis
					<small>Data, and more Data!</small>
				</h1>

				<div class="panel panel-info">
					<div class="panel panel-heading">
						<h2><?php echo $course->courseName ?></h2>
					</div>
					<div class="panel panel-body">
						<h4>Users Enrolled</h4>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>UserID</th>
									<th>Username</th>
									<th>Completion</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (empty($courseUsers)) {
									?>
									<tr>
										<td colspan="3">There are no users enrolled in this course.</td>
									</tr>
									<?php
								} else if (is_array($courseUsers)) {
									foreach ($courseUsers as $courseUser) { 
										?>
										<tr>
											<td><?php echo $courseUser->userID ?></td>
											<td><?php echo $courseUser->username ?></td>
											<td><?php echo $courseUser->completion ?></td>
										</tr>
										<?php
									};
								} else {
									?>
									<tr>
										<td><?php echo $courseUsers; ?></td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>

						<h4>Users Completed</h4>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>UserID</th>
									<th>Username</th>
									<th>Score</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (empty($completedUsers)) {
									?>
									<tr>
										<td colspan="3">No users have completed this course yet.</td>
									</tr>
									<?php
								} else if (is_array($completedUsers)) {
									foreach ($completedUsers as $completedUser) { 
										?>
										<tr>
											<td><?php echo $completedUser->userID; ?></td>
											<td><?php echo $completedUser->username; ?></td>
											<td><?php echo $completedUser->grading; ?></td>
										</tr>
										<?php
									};
								} else {
									?>
									<tr>
										<td><?php echo $completedUsers; ?></td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">


					</div>
				</div>
			</div>
		</div>
		<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});

		$(document).ready(function() {
	// $('[data-toggle="tooltip"]').tooltip();
	$('#pageAdmin').removeAttr('href');
});
		</script>
	</body>
	</html>