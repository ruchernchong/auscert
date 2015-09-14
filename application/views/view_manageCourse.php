<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 id="groupIDHeader" value="<?php echo $thisGroup['groupID']; ?>" class="page-header">
					<?php echo $thisGroup['organisation']; ?>&nbsp;
					<small>Manage Courses</small>
				</h1>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
						<div class="col-lg-5">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Courses Assigned to Group</h3>
								</div>
								<div class="panel-body" style="height: 400px;overflow: auto;">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th>Select</th>
												<th>Course ID</th>
												<th>Course Name</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (!empty($assignedCourses)) {
												foreach($assignedCourses as $assignedCourse) {?>
												<tr>
													<td>
														<input type="checkbox" id="assignedChecked_<?php echo $assignedCourse->courseID; ?>" value="<?php echo $assignedCourse->courseID;?>" class="courseActive assignedSelected">
														<label for="assignedChecked_<?php echo $assignedCourse->courseID; ?>" class="activelabel"></label>
													</td>
													<td><?php echo $assignedCourse->courseID; ?></td>
													<td><?php echo $assignedCourse->courseName; ?></td>
												</tr>
												<?php
											}
										} else {
											?>
											<tr>
												<td colspan="3">There are no courses available.</td>
											</tr>
											<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-lg-2">
						<div class="form-group">
							<a class="btn btn-success" id="btn_addCourse">
								<i class="fa fa-caret-left"></i>&emsp;Add Course&emsp;&emsp;
							</a>
						</div>
						<div class="form-group">
							<a class="btn btn-danger" id="btn_removeCourse">Remove Course&emsp;
								<i class="fa fa-caret-right"></i>
							</a>
						</div>
					</div>

					<div class="col-lg-5">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Courses Available</h3>
							</div>
							<div class="panel-body" style="height: 400px;overflow: auto;">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Select</th>
											<th>Course ID</th>
											<th>Course Name</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if (!empty($otherCourses)) {
											foreach ($otherCourses as $otherCourse) {
												?>
												<form id="otherCoursesForm">
													<tr>
														<td>
															<input type="checkbox" id="otherCheck_<?php echo $otherCourse->courseID;?>" value="<?php echo $otherCourse->courseID;?>" class="courseActive otherSelected">
															<label for="otherCheck_<?php echo $otherCourse->courseID; ?>"></label>
														</td>
														<td><?php echo $otherCourse->courseID; ?></td>
														<td><?php echo $otherCourse->courseName; ?></td>
													</tr>
												</form>
												<?php
											}
										} else {
											?>
											<tr>
												<td colspan="2">There are no courses available.</td>
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
			</div>
		</div>
	</div>
</div>

<!-- Include script for event listeners -->
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>