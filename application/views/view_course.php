<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Courses
					<small>Learn.AusCert</small>
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="wrapper wrapper-content animated fadeInUp">
					<div class="row">
						<div class="col-lg-8"></div>
						<div class="col-lg-4">
							<div class="input-group">
								<div class="input-group-btn">
									<!--<button type="button" class="btn btn-info">
										<i class="fa fa-refresh"></i>&emsp;Refresh
									</button> -->
								</div>
								<input type="search" placeholder="Search Courses" class="form-control">
								<div class="input-group-btn">
									<button type="button" class="btn btn-primary">
										<i class="fa fa-search"></i> <!--&emsp;Search -->
									</button>
								</div>
							</div>
						</div>
					</div>
					<br />
					<div class="project-list">
						<table class="table table-hover">
							<tbody>
								<?php 
								if (empty($userCourses[0]->completion)) {
									?>
									<label>You do not have any courses enrolled.</label>
									<?php
								} else {
									foreach ($userCourses as $userCourse) { 
										?>
										<tr data-href="<?php echo site_url('learning?courseID=' . $userCourse->courseID); ?>">
											<td class="project-status">
												<?php
												if ($userCourse->completion == "100") {
													?>
													<span class="label label-success">Completed</span>
													<?php
												} else if ($userCourse->completion == "0") {
													?>
													<span class="label label-danger">Not Started</span>
													<?php
												} else {
													?>
													<span class="label label-warning">In Progress</span>
													<?php 
												} 
												?>
											</td>
											<td class="project-title">
												<h4>
													<i class="fa fa-tasks"></i>&emsp;<?php echo $userCourse->courseName; ?><br>
													<small>
														<i class="fa fa-line-chart"></i>&emsp;
														Grade: <?php echo (empty($userCourse->grading)) ? 'Not Graded' : $userCourse->grading; ?>
													</small>
												</h4>
											</td>
											<td class="project-completion">
												<p>Percentage completed: <?php echo $userCourse->completion; ?>%</p>
												<div class="progress progress-mini">
													<div style="width: <?php echo $userCourse->completion; ?>%" class="progress-bar"></div>
												</div>
											</td>
										</tr>
										<?php 
									}
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
</div>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});

$(document).ready(function() {
	// $('[data-toggle="tooltip"]').tooltip();
	$('#pageCourse').removeAttr('href');
});
</script>
</body>
</html>