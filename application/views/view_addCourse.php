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
				<div class="form-group">
					<form name ="userInput" id="userInput" action="addCourse/createCourse" method="post">
						<label for="courseName">Course Name</label>
						<input class="form-control" name="courseName" required>
						<p class="help-block">Must be filled</p>

						<label for="courseCategory">Category</label>
						<input class="form-control" name="courseCategory" required>
						<p class="help-block">Must be filled</p>

						<label for="courseDescription">Description</label>
						<textarea class="form-control" rows="5" name="courseDescription" required></textarea>
						<p class="help-block">Must be filled</p>

						<input type="submit" class="btn btn-success" value="Submit" />
						<button type="reset" class="btn btn-danger">Reset</button>
					</form>
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