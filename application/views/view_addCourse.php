<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add new Course
					<small>New Lesson</small>
				</h1>
			</div>
		</div>

		<div class="row">	
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!-- <div class="panel panel-heading">
						<h4 class="panel-title">Add Course</h4>
					</div> -->
					<div class="panel panel-body">
						<div class="form-group">
							<?php
							$attributes = array(
								'id' => 'userInput',
								'name' => 'userInput',
								'class' => 'userInput'
								);
							echo form_open('addCourse/createCourse', $attributes);
							?>
							<!-- <form name ="userInput" id="userInput" action="addCourse/createCourse" method="post"> -->
							<label for="createCourseName">Course Name</label>
							<input class="form-control" id="createCourseName" name="createCourseName">
							<span class="help-block errorMessage"><?php echo empty(form_error('createCourseName')) ? "Must be filled" : form_error('createCourseName'); ?></span>

							<label for="createCourseCategory">Category</label>
							<select class="form-control" id="createCourseCategory" name="createCourseCategory">
								<!-- Example options. Will change to dynamic. -->
								<option value="Introductory">Introductory Courses</option>
								<option value="Safety">Safety</option>
								<option value="Security">Security</option>
							</select>
							<span class="help-block errorMessage"><?php echo empty(form_error('createCourseCategory')) ? "Must be filled" : form_error('createCourseCategory'); ?></span>

							<label for="createCourseDescription">Description</label>
							<textarea class="form-control" rows="5" id="createCourseDescription" name="createCourseDescription"></textarea>
							<span class="help-block errorMessage"><?php echo empty(form_error('createCourseDescription')) ? "Must be filled" : form_error('createCourseDescription'); ?></span>

							<input type="submit" class="btn btn-success" value="Submit" />
							<button type="reset" class="btn btn-danger">Reset</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script src="<?php echo base_url('assets/js/dash.js'); ?>"></script>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>