<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Edit Course <small>GUYS</small></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#course_details" data-toggle="tab">Course Details</a>
                        </li>
                        <li>
                            <a href="#course_quiz" data-toggle="tab">Quiz</a>
                        </li>
                        <?php for($i=0; $i < sizeof($slides); $i++) {
                        ?>
                        <li>
                        <a href="#slide_<?php echo $slides[$i]->slideOrder?>" data-toggle="tab"><?php echo printf('%d - %s', $slides[$i]->slideOrder, $slides[$i]->slideTitle); ?></a>
                        </li>
                        <?php } ?>
                        <li>
                        <a href="#" class="add-contact" data-toggle="tab">+ Add Chapter</a>
                        </li>
                    </ul>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="course_details">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group" >
                                                        <label>Course Name</label>
                                                        <input class="form-control" name="courseName" value="<?php echo $courses[0]->courseName; ?>" required>
                                                        <br />
                                                        <label for="courseCategory">Category</label>
                                                        <input class="form-control" name="courseCategory" value="<?php echo $courses[0]->category; ?>" required>
                                                        <br />
                                                        <label for="courseDescription">Description</label>
                                                        <textarea class="form-control" rows="5" name="courseDescription" required><?php echo $courses[0]->description; ?></textarea>
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="course_quiz">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group" >
                                                        <label>Quiz (Non functional)</label>
                                                        <div class="panel-body quiz">

                                                            <p>
                                                                <label> Question 1: </label>
                                                                <input class="form-control" id="url_1" value="What is it?">
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
                                                                </label></br>
                                                                <label>Answer 1: </label>
                                                                <label class="radio-inline_1">
                                                                    <input type="radio" name="optionsRadiosInline" id="options0" value="0">
                                                                    a </label>
                                                                <label class="radio-inline_1">
                                                                    <input type="radio" name="optionsRadiosInline" id="options1" value="1">
                                                                    b </label>
                                                                <label class="radio-inline_1">
                                                                    <input type="radio" name="optionsRadiosInline" id="options2" value="2">
                                                                    c </label>
                                                                <label class="radio-inline_1">
                                                                    <input type="radio" name="optionsRadiosInline" id="options3" value="3"  checked>
                                                                    d </label>
                                                            </p>
                                                            <p>
                                                                <a href="#" id="add"> Add another Question </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php for($i=0; $i < sizeof($slides); $i++) { ?>
                                        <div class="tab-pane fade" id="slide_<?php echo $slides[$i]->slideOrder?>">
                                            <div class="form-group">
                                                <label>Chapter title </label>
                                                <input class="form-control" name="title_<?php echo $slides[$i]->slideOrder?>" value="<?php echo $slides[$i]->slideTitle?>">
                                                <br />
                                                <label>Chapter contents</label>
                                                <textarea name="editor_<?php echo $slides[$i]->slideOrder ?>" id="editor_<?php echo $slides[$i]->slideOrder?>" rows="10" cols="80"><?php echo $slides[$i]->slideContent ?></textarea>
                                            </div>
                                        </div>
                                        
                                        
                                        <?php 
                                            echo printf('<script> CKEDITOR.replace(editor_%d); </script>', $slides[$i]->slideOrder);
                                        }                                         
                                        ?>
                                        
                                        
                                        
                                    </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-default">
                            Reset
                        </button>
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