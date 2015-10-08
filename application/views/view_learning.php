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
						<a href="#course-details" data-toggle="tab"><i class="fa fa-database"></i>&emsp;Course Details</a>
					</li>

					<?php
					for ($i=0; $i < sizeof($slides); $i++) {
						?>
						<li id="<?php echo $i; ?>">
							<a href="#chapter-<?php echo $i; ?>" data-toggle="tab">
								<i class="fa fa-book"></i>&emsp;<?php echo $i+1 . " &mdash; " . $slides[$i]->slideTitle; ?>
							</a>
							<span><i class="fa fa-times"></i></span>
						</li>
						<?php
					}

					if(count($questions) > 0 && ! $completed) {
					?>
					<li>
						<a href="#course-quiz" data-toggle="tab"><i class="fa fa-graduation-cap"></i>&emsp;Quiz</a>
					</li>

					<?php
						}
					?>
				</ul>

				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="course-details">
									<h3>
										Category:&emsp;<?php echo $course->category; ?>
									</h3>
									<p>
										<?php echo $course->description; ?>
									</p>
								</div>
								<?php 
								for ($i=0; $i < sizeof($slides); $i++) {
									?>
									<div class="tab-pane fade" id="chapter-<?php echo $i; ?>">
										<h2><?php echo $slides[$i]->slideTitle; ?></h2>
										<p>
											<?php echo $slides[$i]->slideContent ?>
										</p>
									</div>
									<?php
								}
								error_log($completed);
								if(count($questions) > 0 && ! $completed) {
								?>
									<div class="tab-pane fade" id="course-quiz">
										<div class="row display-table">
											<div class="col-md-1 display-cell">
												<i id="prev" class="fa fa-chevron-circle-left fa-5x" style="color:#bbb"></i>
											</div>
											<div class="col-md-10">
												<?php
												$attributes = array(
													'id' => 'userInput',
													'name' => 'userInput'
													);
												echo form_open('learning/quiz/' . $course->courseID, $attributes);

												for ($i=0; $i < sizeof($questions); $i++) {
													if ($i == 0) {
														?>
														<div class="collapse in" id="current-question">
															<?php
														} else {
															?>
															<div class="collapse">
																<?php
															}
															?>
															<h3>Question <?php echo $i+1; ?></h3>
															<p>
																<?php echo $questions[$i]->questionText; ?>
															</p>
															<ul>
																<?php
																for ($j=0; $j < sizeof($answers[$i]); $j++) {
																	?>
																	<li>
																		<input type="radio" name="<?php echo 'q' . $i; ?>" value="<?php echo $j; ?>" required/>&emsp;<?php echo $answers[$i][$j]->answerText; ?>
																	</li>
																	<?php
																}
																?>
															</ul>
														</div>
														<?php
													}
													?>
												</div>
												<div class="col-md-1 display-cell">
													<i id="next" class="fa fa-chevron-circle-right fa-5x " style="color:#bbb"></i>
												</div>
											</div>
										</form>
									</div>
								<?php
									}
								?>
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
	</script>
</body>
</html>