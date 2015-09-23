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
						<?php
						$attributes = array(
							'id' => 'userInput',
							'name' => 'userInput',
							'class' => 'userInput'
							);
						echo form_open('addCourse/createCourse', $attributes);
						?>
						<div class="form-group">
							<label for="createCourseName">Course Name</label>
							<input class="form-control" id="createCourseName" name="createCourseName">
							<span class="help-block errorMessage"><?php echo empty(form_error('createCourseName')) ? "Must be filled" : form_error('createCourseName'); ?></span>
						</div>

						<div class="form-group">
							<label for="createCourseCategory">Category</label>
							<select class="form-control" id="createCourseCategory" name="createCourseCategory">
								<!-- Example options. Will change to dynamic. -->
								<option disabled selected> -- Please select a Category -- </option>
								<option value="Introductory">Introductory Courses</option>
								<option value="Safety">Safety</option>
								<option value="Security">Security</option>
							</select>
							<span class="help-block errorMessage"><?php echo empty(form_error('createCourseCategory')) ? "Must be filled" : form_error('createCourseCategory'); ?></span>
						</div>

						<div class="form-group">
							<label for="createCoursePassPercentage">Quiz pass percentage</label>
							<!--<input type="range"  value="50" min="1" max="100" id="passPercentageSlider"/>-->
							<input type="number" value="50" min="1" max="100" class="form-control" id="createCoursePassPercentage" name="createCoursePassPercentage">
							<span class="help-block errorMessage"><?php echo empty(form_error('createCoursePassPercentage')) ? "Must be filled" : form_error('createCoursePassPercentage'); ?></span>
						</div>

						<div class="form-group">
							<label for="createCourseDescription">Description</label>
							<textarea class="form-control" rows="5" id="createCourseDescription" name="createCourseDescription"></textarea>
							<span class="help-block errorMessage"><?php echo empty(form_error('createCourseDescription')) ? "Must be filled" : form_error('createCourseDescription'); ?></span>
						</div>

						<div class="input-group">
							<input type="submit" class="btn btn-success" value="Submit" />
							<button type="reset" class="btn btn-danger">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>