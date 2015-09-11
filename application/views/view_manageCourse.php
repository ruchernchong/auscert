<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php echo $thisGroup[0]->organisation ?>&nbsp;
					<small>Manage Courses</small>
				</h1>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<div class="col-lg-5">
                        <div class="panel panel-primary">
                            <div class="panel panel-heading">
                                <h3 class="panel-title">Courses Assigned to Group</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Course ID</th>
                                            <th>Course Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($assignedCourses)) {
                                            foreach($assignedCourses as $course) {?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="activeNotChecked_<?php echo $course->courseID; ?>" class="courseActive">
                                                    <label for="activeNotChecked_<?php echo $course->courseID; ?>" activelabel"></label>
                                                </td>
                                                <td><?php echo $course->courseID ?></td>
                                                <td><?php echo $course->courseName ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="2">There are no courses available.</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
				    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                        <a class="btn btn-success"><i class="fa fa-caret-left"></i>&emsp;Add Course&emsp;&emsp;</a>
                            </div>
                        <div class="form-group">
                        <a class="btn btn-danger">Remove Course&emsp;<i class="fa fa-caret-right"></i></a>
                            </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Courses Available</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Course ID</th>
                                            <th>Course Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($otherCourses as $course) {?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="check_<?php echo $course->courseID;?>" value="<?php echo $course->courseID;?>" class="courseActive">
                                                <label for="activeNotChecked_<?php echo $course->courseID; ?>" activelabel"></label>
                                            </td>
                                            <td><?php echo $course->courseID ?></td>
                                            <td><?php echo $course->courseName ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
			    </div>
		    </div>
	    </div>
    </div>
</div>

<!--Include script for event listeners    -->
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

