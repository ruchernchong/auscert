<!--Modal popup for delete course-->
<div id="courseDelModal" class="modal fade" role="dialog">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
				<h4>Delete Course</h4>
			</div>
			<div class="modal-body">
				<h5>The following course will be deleted. All users and courses will be disassociated from it. Are you sure?</h5>
				<h6>CourseID</h6>
				<a><h6 id="delID"></h6></a>
				<h6>CourseName</h6>
				<a><h8 id="delName"></h8></a>
			</div>
			<div class="modal-footer">
				<a id="yesDelete" href="" type="button" class="btn btn-success">Yes</a>
				<a type="button" class="btn btn-danger" data-dismiss="modal">No</a>
			</div>
		</div>
	</div>
</div>



<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12" ng-controller="LiveSearchController as liveSearch">
				<h1 class="page-header">Admin Page</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-8">
						<a href="<?php echo site_url('addCourse') ?>" class="btn btn-primary">Create new course</a>&emsp;
						Last modified: <i class="fa fa-clock-o"></i>&emsp;<?php echo $courseLastEdited[0]->courseName . "&emsp;" . $courseLastEdited[0]->lastEdited; ?>
						<hr>
					</div>
					<div class="col-lg-4">
						<div class="input-group">
							<input type="search" placeholder="Search Users" class="form-control" id="userSearchBar">
							<span class="input-group-btn">
								<button type="button" class="btn btn-primary">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="clients-list">
					<ul class="nav nav-tabs">
						<li class="active">
							<a data-toggle="tab" href="#tab-courses"><i class="fa fa-briefcase"></i>&emsp;Courses</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tab-members"><i class="fa fa-user"></i>&emsp;Members</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tab-groups"><i class="fa fa-users"></i>&emsp;Groups</a>
						</li>
					</ul>

					<div class="tab-content">
						<div id="tab-members" class="tab-pane fade">
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
									<tr>
										<th>First Name</th>
										<th>Last Name</th>
										<th>UserID</th>
										<th>Groups</th>
										<th>User Type</th>
										<th>Email Address</th>
										<th>Contact No.</th>
										<th>Actions</th>
									</tr>
									</thead>
									<tbody id="users_results">
									<?php foreach ($users as $user) { ?>
										<tr>
											<td>
												<a href="#"><?php echo $user['fname']; ?></a>
											</td>
											<td>
												<a href="#"><?php echo $user['lname']; ?></a>
											</td>
											<td>
												<!--												<a data-toggle="tab" href="#--><?php //echo $user['userID']; ?><!--" class="client-link">--><?php //echo $user['userID']; ?><!--</a>-->
												<?php echo $user['userID']; ?>
											</td>
											<td>
												<?php
												$userArrays = $user['groupArray'];
												if (!empty($userArrays)) {
													foreach ($userArrays as $userArray) {
														?>
														<ul>
															<li>
																<a href="#"><?php echo $userArray['organisation']; ?></a>
															</li>
														</ul>
														<?php
													}
												} else {
													?>
													<ul>
														<li>No Groups</li>
													</ul>
													<?php
												}
												?>
											</td>
											<td>
												<?php echo $user['usertype']; ?>
											</td>
											<td>
												<i class="fa fa-envelope"></i>&emsp;<a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a>
											</td>
											<td>
												<i class="fa fa-phone"></i>&emsp;<a href="tel:<?php echo $user['contact']; ?>"><?php echo $user['contact']; ?></a>
											</td>
											<td class="user-actions">
												<a href="<?php echo site_url('manageUserCourse/' . $user['userID']);?>" class="btn btn-sm btn-success">
													<i class="fa fa-pencil"></i>&emsp;Manage Courses
												</a>
												&nbsp;
												<a href="<?php echo site_url('manageUserGroup/' . $user['userID']); ?>" class="btn btn-sm btn-primary">
													<i class="fa fa-bar-chart-o"></i>&emsp;Manage Groups
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

						<div id="tab-courses" class="tab-pane fade in active">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
									<th>Course List</th>
									<th>Last Edited</th>
									<th>Status</th>
									<th>Actions</th>
									</thead>
									<tbody>
									<?php foreach ($courses as $course) {
										?>
										<tr>
											<td><a href="<?php echo site_url('learning/' . $course->courseID); ?>"><?php echo $course->courseName; ?></a></td>
											<td><?php echo empty($course->lastEdited) ? "None" : $course->lastEdited; ?></td>
											<td>
												<?php
												if ($course->active == 1) {
													?>
													<div class="btn btn-sm btn-default">
														<input type="checkbox" id="activeChecked_<?php echo $course->courseID; ?>" class="courseActive" checked>
														<label for="activeChecked_<?php echo $course->courseID; ?>" class="activeLabel">Active</label>
													</div>
													<?php
												} else {
													?>
													<div class="btn btn-sm btn-default">
														<input type="checkbox" id="activeNotChecked_<?php echo $course->courseID; ?>" class="courseActive">
														<label for="activeNotChecked_<?php echo $course->courseID; ?>" class="activeLabel">Active</label>
													</div>
													<?php
												}
												?>
											</td>

											<td class="project-actions">
												<a href="<?php echo site_url('edits/' . $course->courseID);?>" class="btn btn-sm btn-success">
													<i class="fa fa-pencil"></i>&emsp;Edit
												</a>
												&nbsp;
												<a href="<?php echo site_url('analysis/' . $course->courseID); ?>" class="btn btn-sm btn-primary">
													<i class="fa fa-bar-chart-o"></i>&emsp;Course Analytics
												</a>
												&nbsp;
												<a id="<?php echo $course->courseID ?>" data-toggle="modal" data-target="#courseDelModal" class="courseDelBtn btn btn-sm btn-danger" data-delName="<?php echo $course->courseName ?>" data-delUrl="<?php echo site_url('admin/dropCourse/' . $course->courseID); ?>">
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

						<div id="tab-groups" class="tab-pane fade">
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
									<tr>
										<th>Group Name</th>
										<th>Total Members</th>
										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach($groups as $group) {?>
										<tr>
											<td><?php echo $group['organisation'] ?></td>
											<td><?php echo $group['userCount'] ?></td>
											<td>
												<a href="<?php echo base_url('manageMember/' . $group['groupID']); ?>" class="btn btn-sm btn-success"><i class="fa fa-signal"></i>&emsp;Manage Members</a>
												&nbsp;
												<a href="<?php echo base_url('manageCourse/' . $group['groupID']); ?>" class="btn btn-sm btn-primary"><i class="fa fa-refresh fa-spin"></i>&emsp;Manage Courses</a>
												&nbsp;
												<a href="<?php echo site_url('admin/dropGroup/' . $group['groupID'])?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&emsp;Delete Group</a>
												&nbsp;
											</td>
										</tr>
									<?php } ?>
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

<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});

	$(document).ajaxStart(function() {
		$("#loader").addClass("loader");
		$(".loader").fadeIn("slow");
	});

	$(document).ajaxStop(function() {
		$(".loader").fadeOut("slow");
	});
</script>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		$('#pageAdmin').removeAttr('href');
		var siteURL = "<?php echo site_url('learning/') ?>";
		var imgURL = "<?php echo base_url('assets/img/user-placeholder.jpg'); ?>";

		$("#userSearchBar").keyup(function(){
			if ($("#userSearchBar").val().length >= 0){
				$.ajax({
					type: "post",
					global: false,
					url: "<?php echo base_url('admin/searchUser'); ?>",
					cache: false,
					data: 'userSearch=' + $('#userSearchBar').val(),
					success: function(response){
//						console.log(response);
						$("#users_results").html("");
						var obj = JSON.parse(response);
//						console.log(obj);
						if (!obj.noResult) {
							$("#users_results").html(obj.html);
						} else {
							$("#users_results").html("<h5>No Users Found</h5>");
						}
					},
					error: function(error) {
						console.log(error);
					}
				});
			}
			return false;
		});

		//Render bootstrap popup for course delete confirmation
		$('.project-actions').on('click', '.courseDelBtn', function(){
//		$('.courseDel').click(function(){
			var thisID = $(this).attr('id');
			var thisName = $(this).attr('data-delName');
			var thisUrl = $(this).attr('data-delUrl');
//			$.ajax({
//				cache: false,
//				type: 'POST',
//				url: 'admin/getDeleteID',
//				data: 'courseID=' + thisID,
//				success: function(data) {
			$('#courseDelModal').show();
			$('#delID').html(thisID);
			$('#delName').html(thisName);
			$('#yesDelete').attr('href', thisUrl);
//				}
//			})
		});

	});
</script>

</body>
</html>