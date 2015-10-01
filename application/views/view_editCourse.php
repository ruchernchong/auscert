<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Course</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<ul class="nav nav-tabs" id="tab-bar">
					<li class="active">
						<a href="#course-details" data-toggle="tab"><i class="fa fa-database"></i>&emsp;Course Details</a>
					</li>
					<li>
						<a href="#course-quiz" data-toggle="tab"><i class="fa fa-graduation-cap"></i>&emsp;Quiz</a>
					</li>
					<?php
					for ($i=0; $i < sizeof($slides); $i++) {
						?>
						<li id="<?php echo 'chapter-tab-' . $i; ?>">
							<a href="#chapter-<?php echo $i; ?>" data-toggle="tab">
								<i class="fa fa-book"></i>&emsp;<?php echo $i+1 . " &mdash; " . $slides[$i]->slideTitle; ?>
							</a>
						</li>
					<?php
					} 
					?>
					<li>
						<a href="#" id="add-chapter" data-toggle="tab"><i class="fa fa-plus"></i></a>
					</li>
				</ul>

				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<?php 
							$attributes = array(
								'id' => 'userInput',
								'name' => 'userInput'
								);

							echo form_open('edits/save/' . $course->courseID, $attributes);
							?>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="course-details">
									<?php
									?>
									<div class="form-group">
										<label>Course Name</label>
										<input class="form-control" name="course-name" value="<?php echo $course->courseName; ?>" required><br />
									</div>
									<div class="form-group">
										<label for="courseCategory">Category</label>
										<input class="form-control" name="course-category" id="course-category" value="<?php echo $course->category; ?>" required><br />
									</div>
									<div class="form-group">
										<label for="coursePassPercentage">Quiz pass percentage</label>
										<input type="number" value="<?php echo $course->passPercentage; ?>" min="1" max="100" class="form-control" id="course-pass-percentage" name="course-pass-percentage">
									</div>
									<div class="form-group">
										<label>Version &mdash; <?php echo $course->version; ?></label>
									</div>
									<div class="form-group">
										<label for="courseDescription">Description</label>
										<textarea class="form-control" rows="5" name="course-description" id="course-description" required>
											<?php echo $course->description; ?>
										</textarea>
									</div>

									<script>CKEDITOR.replace("course-description");</script>

								</div>
								<div class="tab-pane fade" id="course-quiz">
									<?php for ($i=0; $i < sizeof($questions); $i++) { 
										?>
										<div class="form-group" id="q<?php echo $i; ?>">
											<h3><i class="fa fa-minus-square delete-question" style="color:red"></i> &emsp; Question <?php echo $i+1; ?></h3>
											<div class="form-group">
												<textarea class="form-control" name="question-<?php echo $i; ?>" id="question-<?php echo $i; ?>" rows="10" cols="80">
													<?php echo $questions[$i]->questionText; ?>
												</textarea>
											</div>

											<script>CKEDITOR.replace('question-<?php echo $i; ?>');</script>

											<?php for ($j=0; $j < sizeof($answers[$i]); $j++) { 
												?>
												<div class="row">
													<div class="col-md-2">
														<div class="form-group">
															<?php
															if($j == 0) {
																echo '<label>Correct Answer:</label>';
															} else {
																echo sprintf('<label>Alternate %d:</label>', $j);
															}
															?>
														</div>
													</div>
													<div class="col-md-2">
														<div class="row">
															<div class="col-md-2">
																<?php
																if($j >=2) {
																	echo '<i class="fa fa-minus-square delete-answer" style="color:red"></i>';
																}
																?>
															</div>
															<div class="col-md-2">
																<div class="form-group">
																	<input size="64" id="q-<?php echo $i; ?>-a-<?php echo $j; ?>" name="q-<?php echo $i; ?>-a-<?php echo $j; ?>" value="<?php echo $answers[$i][$j]->answerText; ?>" required>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php }	?>
												<div class="form-group">
													<a href="#" class="add-answer">Add another Answer</a>
												</div>
												<hr>
											</div>
											<?php }	?>
											<a href="#" id="add-question">Add a question</a>
											<hr>
										</div>

										<?php for ($i=0; $i < sizeof($slides); $i++) { 
											?>
											<div class="tab-pane fade" id="chapter-<?php echo $i; ?>">
												<label>Chapter controls</label>
												<div class="row">
													<div class="col-md-3">
														<i class="fa fa-caret-square-o-left fa-2x chapter-move-left"></i>
														Move Left
													</div>
													<div class="col-md-3">
														<i class="fa fa-minus-square fa-2x chapter-delete"style="color:red"></i>
														Delete Chapter
													</div>
													<div class="col-md-3">
														<i class="fa fa-caret-square-o-right fa-2x chapter-move-right"></i>
														Move Right
													</div>
												</div><br>

												<div class="form-group">
													<label>Chapter title</label>
													<input class="form-control chapter-title" id ="title-<?php echo $i; ?>" name="title-<?php echo $i; ?>" value="<?php echo $slides[$i]->slideTitle; ?>">
												</div>
												<div class="form-group">
													<label>Chapter contents</label>
													<textarea class="form-control" name="editor-<?php echo $i; ?>" id="editor-<?php echo $i; ?>" rows="10" cols="80">
														<?php echo $slides[$i]->slideContent ?>
													</textarea>
												</div>
											</div>

											<script>CKEDITOR.replace('editor-<?php echo ($i); ?>');</script>

											<?php 
										}
										?>
									</div>
										<div class="form-group">
											<input type="submit" class="btn btn-success" value="Submit" />
											<input type="reset" class="btn btn-danger" value="Reset" />
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo date("d M Y h:i A"); ?>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script>
// $(document).ready(function() {
// 	$("#pageAdmin").addClass("active").removeAttr("href");
// });

$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
}); 
</script>
</body>
</html>