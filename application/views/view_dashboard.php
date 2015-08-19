<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title">
					<h1>Dashboard
						<small>Content Overview</small><br>
					</h1>
					<ol class="breadcrumb">
						<li class="active"><i class="fa fa-dashboard"></i>&emsp;Welcome, <?php echo $username;?></li>
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
							<?php echo isset($NoOfUserCourses) == "" ? "0" : $NoOfUserCourses ?>
						</div>
						<a class="circle-tile-footer courseList">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
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
							<?php echo isset($NoOfCourses) == "" ? "0" : $NoOfCourses ?>
						</div>
						<a class="circle-tile-footer availableCourses">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
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
							<?php echo isset($NoOfGroups) == "" ? "0" : $NoOfGroups ?>
						</div>
						<a class="circle-tile-footer availableGroups">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12" id="courseList">
				<div class="tile checklist-tile orange">
					<h4><i class="fa fa-list"></i>&emsp;Course List</h4>
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
										<label><i class="fa fa-list"></i>&emsp;<?php echo $usercourse->courseName; ?></label>
									</a>
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
					<h4><i class="fa fa-list"></i>&emsp;Available Courses</h4>
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
							foreach ($courses as $course) {
								?>
								<div class="form-group">
									<a href="learning/?courseID=<?php echo $course->courseID; ?>" class="courseLink">
										<label><i class="fa fa-list"></i>&emsp;<?php echo $course->courseName; ?></label>
									</a>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-12" id="availableGroups">
				<div class="tile checklist-tile blue">
					<h4><i class="fa fa-users"></i>&emsp;Available Groups</h4>
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

			<!-- <div class="col-lg-12" id="auscert-logo">
				<div class="tile checklist-tile">
					<img class="logo" src="<?php echo base_url('assets/img/logoAusCert.png'); ?>" alt="AusCert Logo" />
				</div>
			</div> -->
			<!-- <div class="col-lg-3">
				<div class="tile checklist-tile cal" style="height: 200px">
					<p class="time-widget">
						<span class="time-widget-heading">It Is Currently</span>
						<br>
						<strong>
							<span id="datetime">
								<?php echo date("l M d, Y"); ?>
								<br>
								<?php echo date("h:i:s A"); ?>
							</span>
						</strong>
					</p>
				</div>
			</div> -->
		</div>
	</div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
$(document).ready(function() {
	$(".courseList").click(function() {
		$("#courseList").toggle("slow");
		$("#availableCourses").fadeOut("fast");
		$("#availableGroups").fadeOut("fast");

		// $("#auscert-logo").toggle("slow");
	});

	$(".availableCourses").click(function() {
		$("#availableCourses").toggle("slow");
		$("#courseList").fadeOut("fast");
		$("#availableGroups").fadeOut("fast");

		// $("#auscert-logo").toggle("slow");
	});

	$(".availableGroups").click(function() {
		$("#availableGroups").toggle("slow");
		$("#courseList").fadeOut("fast");
		$("#availableCourses").fadeOut("fast");

		// $("#auscert-logo").toggle("slow");
	});
});

$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});

// function toggler(courseList, availableCourses) {
// 	$(".courseList").click(function() {
// 		$("#courseList").show("slow")
// 		$("#availableCourses").hide();
// 	});
// 	$("#" + availableCourses).toggle("slow");	
// }
</script>
</body>
</html>