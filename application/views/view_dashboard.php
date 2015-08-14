<div id="page-wrapper">
	<div class="container-fluid">
		<!-- begin PAGE TITLE AREA -->
		<!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
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
								<!-- Hardcoded stuff; To be changed -->
								<span class="date-range">&emsp;<?php echo date('l\, jS \of F Y'); ?></span> <i class="fa fa-caret-down"></i>
							</div>
						</li>
					</ol>
				</div>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<!-- end PAGE TITLE AREA -->

		<!-- begin DASHBOARD CIRCLE TILES -->
		<div class="row">
			<div class="col-lg-4 col-sm-6">
				<div class="circle-tile">
					<a href="#">
						<div class="circle-tile-heading orange">
							<i class="fa fa-bell fa-fw fa-3x"></i>
						</div>
					</a>
					<div class="circle-tile-content orange">
						<div class="circle-tile-description text-faded">
							Courses Enrolled
						</div>
						<div class="circle-tile-number text-faded">
							<?php echo $number_of_courses ?>
						</div>
						<a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="circle-tile">
					<a href="#">
						<div class="circle-tile-heading blue">
							<i class="fa fa-tasks fa-fw fa-3x"></i>
						</div>
					</a>
					<div class="circle-tile-content blue">
						<div class="circle-tile-description text-faded">
							New Courses Assigned to you
						</div>
						<div class="circle-tile-number text-faded">
							2 (dummy data)
							<span id="sparklineB"><canvas height="24" width="24" style="display: inline-block; width: 24px; height: 24px; vertical-align: top;"></canvas></span>
						</div>
						<a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6">
				<div class="circle-tile">
					<a href="#">
						<div class="circle-tile-heading purple">
							<i class="fa fa-comments fa-fw fa-3x"></i>
						</div>
					</a>
					<div class="circle-tile-content purple">
						<div class="circle-tile-description text-faded">
							Groups
						</div>
						<div class="circle-tile-number text-faded">
							2
							<span id="sparklineD"><canvas height="24" width="36" style="display: inline-block; width: 36px; height: 24px; vertical-align: top;"></canvas></span>
						</div>
						<a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- end DASHBOARD CIRCLE TILES -->

		<div class="row">

			<div class="col-lg-9">
				<div class="row">
					<div class="tile dark-blue checklist-tile">
						<h4><i class="fa fa-check-square-o"></i>Course List</h4>
						<div class="checklist">
							<label class="strikeout">
								<input type="checkbox" checked> <i class="fa fa-wrench fa-fw text-faded"></i> Software Update 2.1
								<span class="task-time text-faded pull-right">Yesterday</span>
							</label>
							<label class="strikeout">
								<input type="checkbox" checked> <i class="fa fa-wrench fa-fw text-faded"></i> Server #2 Hardward Upgrade
								<span class="task-time text-faded pull-right">9:39 AM</span>
							</label>
							<label class="strikeout">
								<input type="checkbox" checked> <i class="fa fa-warning fa-fw text-orange"></i> Call Ticket #2032
								<span class="task-time text-faded pull-right">9:53 AM</span>
							</label>
							<label>
								<input type="checkbox"> <i class="fa fa-warning fa-fw text-orange"></i> Emergency Maintenance
								<span class="task-time text-faded pull-right">10:14 AM</span>
							</label>
							<label>
								<input type="checkbox"> <i class="fa fa-file fa-fw text-faded"></i> Purchase Order #439
								<span class="task-time text-faded pull-right">10:20 AM</span>
							</label>
							<label>
								<input type="checkbox"> <i class="fa fa-pencil fa-fw text-faded"></i> March Content Update
								<span class="task-time text-faded pull-right">10:48 AM</span>
							</label>
							<label>
								<input type="checkbox"> <i class="fa fa-magic fa-fw text-faded"></i> Client #42 Data Scrubbing
								<span class="task-time text-faded pull-right">11:09 AM</span>
							</label>
							<label>
								<input type="checkbox"> <i class="fa fa-wrench fa-fw text-faded"></i> PHP Upgrade Server #6
								<span class="task-time text-faded pull-right">11:17 AM</span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="tile red checklist-tile" style="height: 200px">
					<p class="time-widget">
						<span class="time-widget-heading">It Is Currently</span>
						<br>
						<strong>
							<span id="datetime">
								<?php date_default_timezone_set("Australia/Brisbane"); ?>
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
</script>
</body>
</html>