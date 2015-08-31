<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Course</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#course_details" data-toggle="tab"><i class="fa fa-database"></i>&emsp;Course Details</a>
					</li>
					<li>
						<a href="#course_quiz" data-toggle="tab"><i class="fa fa-graduation-cap"></i>&emsp;Quiz</a>
					</li>
					<?php
					for ($i=0; $i < sizeof($slides); $i++) {
						?>
						<li id = <?php echo $i; ?>>
							<a href="#chapter_<?php echo $i; ?>" data-toggle="tab">
								<i class="fa fa-book"></i>&emsp;<?php echo $i+1 . " &mdash; " . $slides[$i]->slideTitle; ?>
							</a>
							<span>
								<i class="fa fa-times"></i>
							</span>
						</li>
						<?php 
					} 
					?>
					<li>
						<a href="#" class="add-contact" data-toggle="tab"><i class="fa fa-plus"></i>&emsp;Add Chapter</a>
					</li>
				</ul>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form name ="userInput" id="userInput" action="<?php echo site_url('edits/save?courseID=' . $course->courseID); ?>" method="post">
								<div class="tab-content">
									<div class="tab-pane fade in active" id="course_details">
										<?php
										?>
										<label>Course Name</label>
										<input class="form-control" name="courseName" value="<?php echo $course->courseName; ?>" required><br />
										<label for="courseCategory">Category</label>
										<input class="form-control" name="courseCategory" id="courseCategory" value="<?php echo $course->category; ?>" required><br />
										<label for="courseDescription">Description</label>
										<textarea class="form-control" rows="5" name="courseDescription" id="courseDescription" required>
											<?php echo $course->description; ?>
										</textarea>
										<script>CKEDITOR.replace("courseDescription");</script>
										<!-- , $slides[$i]->slideOrder*/; -->
									</div>
									<div class="tab-pane fade" id="course_quiz">
										<label>Quiz (Non functional)</label>
										<div class="panel-body quiz">
											<div class="form-group">
												<label> Question 1: </label>
												<input class="form-control" id="url_1" value="What is it?">
											</div>
											<div class="form-group">
												<label> Option a:
													<input class="form-control" id="url_1" value="Wrong">
												</label>
												<label> Option b:
													<input class="form-control" id="url_1" value="Wrong">
												</label>
												<label> Option c:
													<input class="form-control" id="url_1" value="Wrong">
												</label>
												<label> Option d:
													<input class="form-control" id="url_1" value="Correct">
												</label>
											</div>
											<div class="form-group">
												<label>Answer 1: </label>
												<label class="radio-inline_1">
													<input type="radio" name="optionsRadiosInline" id="options0" value="0">a
												</label>
												<label class="radio-inline_1">
													<input type="radio" name="optionsRadiosInline" id="options1" value="1">b
												</label>
												<label class="radio-inline_1">
													<input type="radio" name="optionsRadiosInline" id="options2" value="2">c
												</label>
												<label class="radio-inline_1">
													<input type="radio" name="optionsRadiosInline" id="options3" value="3" checked>d
												</label>
											</div>
											<div class="form-group">
												<a href="#" id="add">Add another Question</a>
											</div>
										</div>
									</div>

									<?php for($i=0; $i < sizeof($slides); $i++) { ?>
									<div class="tab-pane fade" id="chapter_<?php echo $i; ?>">
										<div class="form-group">
											<label>Chapter title</label>
											<input class="form-control chapter-title" id ="title_<?php echo $i; ?>" name="title_<?php echo $i; ?>" value="<?php echo $slides[$i]->slideTitle; ?>">
										</div>
										<div class="form-group">
											<label>Chapter contents</label>
											<textarea class="form-control" name="editor_<?php echo $i; ?>" id="editor_<?php echo $i; ?>" rows="10" cols="80">
												<?php echo $slides[$i]->slideContent ?>
											</textarea>
										</div>
									</div>
									<script>CKEDITOR.replace(editor_<?php echo ($i); ?>);</script>
									<!-- '/*, $slides[$i]->slideOrder*/; -->
									<?php 
								}
								?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-default">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
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