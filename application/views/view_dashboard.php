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
				<h1 class="page-header">Dashboard - Leon was here
					<small>Content Overview</small>
				</h1>
				<ol class="breadcrumb">
					<li class="pull-right">
						<div id="reportrange" class="btn btn-green btn-square date-picker">
							<i class="fa fa-calendar"></i>
							<span class="date-range">&emsp;<?php echo date('l\, jS \of F Y'); ?></span> <i class="fa fa-caret-down"></i>
						</div>
					</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-sm-6">
			<div class="circle-tile">
				<a href="#">
					<div class="circle-tile-heading orange">
						<i class="fa fa-bar-chart fa-fw fa-3x"></i>
					</div>
				</a>
				<div class="circle-tile-content orange">
					<div class="circle-tile-description text-faded">
						Courses Enrolled
					</div>
					<div class="circle-tile-number text-faded">
						<?php echo empty($NoOfUserCourses) ? "0" : $NoOfUserCourses ?>
					</div>
					<!-- <a class="circle-tile-footer courseList">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a> -->
					<a class="circle-tile-footer" onclick="toggler('courseList', 'availableCourses', 'availableGroups');">More Info&nbsp;
						<i class="fa fa-chevron-circle-right"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-sm-6">
			<div class="circle-tile">
				<a href="#">
					<div class="circle-tile-heading green">
						<i class="fa fa-search fa-fw fa-3x"></i>
					</div>
				</a>
				<div class="circle-tile-content green">
					<div class="circle-tile-description text-faded">
						Browse Available Courses
					</div>
					<div class="circle-tile-number text-faded">
						<?php echo empty($count_coursesAvail) ? "0" : $count_coursesAvail ?>
					</div>
						<!-- <a class="circle-tile-footer availableCourses">More Info&nbsp;
							<i class="fa fa-chevron-circle-right"></i>
						</a> -->
						<a class="circle-tile-footer" onclick="toggler('availableCourses', 'courseList', 'availableGroups');">More Info&nbsp;
							<i class="fa fa-chevron-circle-right"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
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
			</div>
		</div>

		<div class="row">
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
			<div class="col-lg-12" id="availableGroups">
				<div class="tile checklist-tile blue">
					<h4 class="moreInfo-title">Available Groups</h4>
					<div class="checklist">
						<?php
						if (empty($userGroups[0]->organisation)) {
							?>
							<div class="form-group">
								<label>There are 0 user groups available.</label>
							</div>
							<?php
						} else {
							?>
							<?php
							foreach ($userGroups as $userGroup) {
								?>
								<div class="form-group">
									<a href="#" class="courseLink">
										<label><i class="fa fa-users"></i>&emsp;<?php echo $userGroup->organisation; ?></label>
									</a>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function toggler(toggle, hideOne, hideTwo) {
	$("#" + toggle).toggle("slow");
	$("#" + hideOne).hide("slow")
	$("#" + hideTwo).hide("slow")
}

$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	$('#pageHome').removeAttr('href');
	$('#confirmEnrol').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
});
</script>
</body>
</html>