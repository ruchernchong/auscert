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
						<a href="#" class="circle-tile-footer" onclick="toggler('courseList');">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
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
						<a href="#" class="circle-tile-footer">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
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
						<a href="#" class="circle-tile-footer">More Info&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-9" id="courseList">
				<div class="tile checklist-tile courseL">
					<h4><i class="fa fa-check-square-o"></i>Course List</h4>
					<div class="checklist">
						
						<?php 
						if (isset($user_courses[0]->courseName) == 0) {
							?>
							<div class="form-group">
								<label>You have enrolled in 0 courses.</label>
							</div>
							<?php
						} else {
							foreach ($user_courses as $usercourse) {
								?>
								<div class="form-group">
									<label><i class="fa fa-list"></i>&emsp;<?php echo $usercourse->courseName; ?></label>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
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
			</div>

		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
function toggler(courseList) {
	$("#" + courseList).toggle("slow");
}
</script>
</body>
</html>