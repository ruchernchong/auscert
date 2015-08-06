<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Edit Course <small>GUYS</small>
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
												<input class="form-control" value="Phising Email">
												<p class="help-block">Must be filled</p>
											</div>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="contact_01">
											<div class="form-group">
												<label>Insert the topic</label>
												<textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
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
													<input class="form-control" id="url_1" value="What is it?">
													<label> Option a: <input class="form-control" id="url_1" value="Wrong"> </label>
													<label> Option b: <input class="form-control" id="url_1" value="Wrong"> </label>
													<label> Option c: <input class="form-control" id="url_1" value="Wrong"> </label>
													<label> Option d: <input class="form-control" id="url_1" value="Correct"> </label></br>
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
														<input type="radio" name="optionsRadiosInline" id="options3" value="3"  checked>d
													</label>
												</p>
												<p> <a href="#" id="add"> Add another Question </a> </p>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
														Addition Task
													</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse">
												<div class="panel-body">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
												</div>
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