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
					<form name ="userinput" action="addCourse/addCourse" method="post">
						<label>Course Name</label>
						<input class="form-control" name="name">
						<p class="help-block">Must be filled</p>

						<label>Category</label>
						<input class="form-control" name="category">
						<p class="help-block">Must be filled</p>

						<label>Description</label>
						<textarea class="form-control" rows="5" name="description"></textarea>
						<p class="help-block">Must be filled</p>

						<button type="reset" class="btn btn-danger pull-right">Reset</button>
						<input type="submit" class="btn btn-success pull-right" value="Submit" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dash.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>