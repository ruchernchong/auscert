<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Course <small>GUYS</small>
				</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="wrapper wrapper-content animated fadeInUp">
					<div class="ibox">
						<div class="ibox-title">
							<div class="ibox-tools">
							</div>
						</div>
						<div class="ibox-content">
							<div class="row m-b-sm m-t-sm">
								<div class="col-md-1">
									<button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Refresh</button>
								</div>
								<div class="col-md-11">
									<div class="input-group"><input placeholder="Search" class="input-sm form-control" type="text"> <span class="input-group-btn">
										<button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
									</div>
								</div>

								<div class="project-list">
									<table class="table table-hover">
										<tbody>
											<?php foreach ($lessons as $l) { ?>
											<tr>
												<td class="project-status">
													<span class="label label-default">Not finished</span>
												</td>
												<td class="project-title">
													<a href="<?php echo site_url('learning?lid='.$l->lessonID) ?>"><?php echo $l->lessonName; ?></a>
													<br>
													<small>Created 14.08.2014</small>
												</td>
												<td class="project-completion">
													<small>Completion with: 48%</small>
													<div class="progress progress-mini">
														<div style="width: 48%;" class="progress-bar"></div>
													</div>
												</td>
											</tr>
											<?php 
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
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/email.js'); ?>"></script>

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