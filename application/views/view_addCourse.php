<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Add new Course <small>GUYS</small>
				</h1>
			</div>
		</div>

		<div class="row">	
			<div class="col-lg-12">
				<div class="panel panel-default">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#contact_01" data-toggle="tab">Test 1</a></li>
						<li><a href="#" class="add-contact" data-toggle="tab">+ Add Test</a></li>
					</ul>

					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form role="form">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group" >
												<label>Course Name</label>
												<input class="form-control">
												<p class="help-block">Must be filled</p>
											</div>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="contact_01">
											<div class="form-group">
												<label>Insert the topic</label>
												<textarea name="editor1" id="editor1" rows="10" cols="80" placeholder=""></textarea>
												<script>
												// Replace the <textarea id="editor1"> with a CKEditor
												// instance, using default configuration.
												CKEDITOR.replace( 'editor1' );
												</script>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="panel panel-default">
											<div class="panel-heading">
												Add Quiz
											</div>
											<div class="panel-body quiz">
												<p> <label> Question 1: </label> 
													<input class="form-control" id="url_1">
													<label> Option a: <input class="form-control" id="url_1"> </label>
													<label> Option b: <input class="form-control" id="url_1"> </label>
													<label> Option c: <input class="form-control" id="url_1"> </label>
													<label> Option d: <input class="form-control" id="url_1"> </label></br>
													<label>Answer 1: </label>
													<label class="radio-inline_1">
														<input type="radio" name="optionsRadiosInline" id="options0" value="0" />a
													</label>
													<label class="radio-inline_1">
														<input type="radio" name="optionsRadiosInline" id="options1" value="1" />b
													</label>
													<label class="radio-inline_1">
														<input type="radio" name="optionsRadiosInline" id="options2" value="2" />c
													</label>
													<label class="radio-inline_1">
														<input type="radio" name="optionsRadiosInline" id="options3" value="3" />d
													</label>
												</p>
												<p> <a href="#" id="add"> Add another Question </a> </p>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-default">Submit</button>
									<button type="reset" class="btn btn-default">Reset</button>
								</form>
							</div>
							<!-- /.col-lg-6 (nested) -->

							<!-- /.col-lg-6 (nested) -->
						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->

				<!-- /.col-lg-12 -->
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
<script src="<?php echo base_url('assets/js/dash.js'); ?>"></script>


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