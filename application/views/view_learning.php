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
						<?php
						for ($i=0; $i<count($slides); $i++) {
							if ($i == 0) {
								?>
								<li class="active">
									<a href="#tab-<?php echo($i + 1); ?>" data-toggle="tab"><i
										class="fa fa-database"></i>&emsp;<?php echo "Active Chapter " . ($i + 1) ?>
									</a>
								</li>
								<?php
							} else {
								?>
								<li>
									<a href="#tab-<?php echo($i + 1); ?>" data-toggle="tab"><i
										class="fa fa-database"></i>&emsp;<?php echo "Chapter " . ($i + 1) ?></a>
									</li>
									<?php
								}
							}
							?>
						</ul>

						<div class="panel-body">
							<?php
							if (empty($slides)) {
								?>
								<div class="tab-content">
									<div id="tab-content" class="tab-pane active">
										<!-- <div class="panel-group" id="accordion"> -->
										<div class="panel-group accordion">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">There are no slides found in this course.</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
							} else {
								?>
								<div class="tab-content">
									<?php
									$i = 0; //set counter
									foreach ($slides as $slide) {
										?>
										<div id="tab-<?php echo($i + 1); ?>" class="tab-pane fade <?php echo(($i == 0) ? 'in active' : ''); ?>">
											<div class="col-lg-12">
												<h2>
													<small><?php echo $slide->slideTitle; ?></small>
												</h2>
												<!-- <div class="panel-group" id="accordion"> -->
												<div class="panel-group accordion">
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
												</div>
											</div>
										</div>
										<?php

										if ($i == count($slides) - 1) {
											?>
											<a href="<?php echo site_url('course') ?>" class="btn btn-default btn-success">Finish</a>
											<?php
										} else {
											?>
											<a data-toggle="tab" href="#tab-<?php echo($i + 2); ?>" class="btn btn-default btn-warning">Next</a>
											<?php
										}
										?>
									</div>
									<?php
									$i++;
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <script src="<?php echo base_url('assets/js/main.js'); ?>"></script> -->
</body>
</html>