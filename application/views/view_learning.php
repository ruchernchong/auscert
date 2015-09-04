<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php echo $course->courseName; ?></h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#courseChapter" data-toggle="tab"><i class="fa fa-database"></i>&emsp;<?php echo "Chapter here" ?></a>
						</li>
						<li>
							<a href="#courseChapter2" data-toggle="tab"><i class="fa fa-database"></i>&emsp;<?php echo "Chapter here" ?></a>
						</li>
					</ul>

					<div class="panel-body">
						<?php
						if (empty($slides)) {
						?>
						<div class="tab-content">
							<div id="tab-content" class="tab-pane active">
								<div class="col-lg-12">
								</div>
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">There are no slides found in this course.</h3>
										</div>
									</div>
								</div>
							</div>
							<?php
							} else {
							$i = 0; //set counter
							?>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="chapter1">

								</div>

								<div class="tab-pane fade in" id="chapter2">

								</div>

								<?php foreach ($slides as $slide) { ?>
								<div class="tab-content">
									<div id="tab-<?php echo($i + 1); ?>"
										 class="tab-pane <?php echo(($i == 0) ? 'active' : ''); ?>">
										<div class="col-lg-12">
											<h2>
												<small><?php echo $slide->slideTitle; ?></small>
											</h2>
											<div class="panel-group" id="accordion">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse"
															   href="#collapseOne<?php echo(($i > 0) ? $i + 1 : ""); ?>">Readings</a>
														</h4>
													</div>

													<div id="collapseOne<?php echo(($i > 0) ? $i + 1 : ""); ?>"
														 class="panel-collapse collapse in">
														<div class="panel-body">
															<?php echo $slide->slideContent; ?>
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle collapsed" data-toggle="collapse"
															   href="#collapseThree<?php if ($i > 0) {
																   echo($i + 1);
															   } ?>">Quiz</a>
														</h4>
													</div>
													<div id="collapseThree<?php echo(($i > 0) ? $i + 1 : ""); ?>"
														 class="panel-collapse collapse">
														<div class="panel-body">
															Under Construction
														</div>
													</div>
												</div>
											</div>

											<?php
											if ($i == sizeof($slides) - 1) {
												?>
												<a href="<?php echo site_url('course') ?>"
												   class="btn btn-default btn-success">Finish</a>
												<?php
											} else {
												?>
												<a data-toggle="tab" href="#tab-<?php echo($i + 2); ?>"
												   class="btn btn-default btn-warning">Next</a>
												<?php
											}
											?>
										</div>
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
	</div>
</div>
</div>
<script src="<?php echo base_url('assets/js/email.js'); ?>"></script>
</body>
</html>