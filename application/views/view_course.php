<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Course 
					<small>Learn.AusCert</small>
				</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="wrapper wrapper-content animated fadeInUp">
					<div class="ibox">
						<div class="ibox-content">
							<div class="row m-b-sm m-t-sm">
								<div class="col-md-1">
									<button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Refresh</button>
								</div>

								<div class="col-md-11">
									<div class="input-group">
										<input placeholder="Search" class="input-sm form-control" type="text">
										<span class="input-group-btn">
											<button type="button" class="btn btn-sm btn-primary"> Go!</button>
										</span>
									</div>
								</div>
							</div>

							<div class="project-list">
								<table class="table table-hover">
									<tbody>
										<?php 
										if (empty($user_courses[0]->completion)) {
											?>
											<label>You do not have any courses enrolled.</label>
											<?php
										} else {
											foreach ($user_courses as $user_course) { 
												?>
												<tr data-href= "<?php echo site_url('learning?courseID='.$user_course->courseID) ?>">
													<td class="project-status">
														<?php
														if ($user_course->completion == "100") {
															?>
															<span class="label label-success">Completed</span>
															<?php
														} else if ($user_course->completion == "0") {
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
														<?php echo $user_course->courseName; ?></a>
														<br>
													</td>
													<td class="project-completion">
														<small>Percentage completed: <?php echo $user_course->completion; ?>%</small>
														<div class="progress progress-mini">
															<div style="width: <?php echo $user_course->completion; ?>%" class="progress-bar"></div>
														</div>
													</td>
												</tr>
												<?php 
											}
										}
										?>
										<!--
										<tr>
										<td class="project-status">
										<span class="label label-default">not finish</span>
										</td>
										<td class="project-title">
										<a href="#">Choosing safe password</a>
										<br>
										<small>Created 10.08.2014</small>
										</td>
										<td class="project-completion">
										<small>Completion with: 8%</small>
										<div class="progress progress-mini">
										<div style="width: 8%;" class="progress-bar"></div>
										</div>
										</td>
										</tr>
									-->
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
</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
<!-- <script src="<?php echo base_url('assets/js/email.js'); ?>"></script> -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>