<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 id="userIDHeader" value="<?php echo $thisUser->userID; ?>" class="page-header">
                    <?php echo $thisUser->fname . " " . $thisUser->lname; ?>&nbsp;
                    <small>Manage Courses</small>
                </h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div class="col-lg-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Courses User is Enrolled In</h3>
                                    <!--									<input id="leftSearchBar" placeholder="Search Courses">-->
                                </div>
                                <div class="panel-body" style="height: 400px;overflow: auto;">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Course Name</th>
                                            <th>Course ID</th>
                                        </tr>
                                        </thead>
                                        <tbody id="leftCoursePanel">
                                        <?php
                                        if (!empty($assignedCourses)) {
                                            foreach($assignedCourses as $assignedCourse) {?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" id="assignedChecked_<?php echo $assignedCourse->courseID; ?>" value="<?php echo $assignedCourse->courseID;?>" class="courseActive assignedSelected">
                                                        <label for="assignedChecked_<?php echo $assignedCourse->courseID; ?>" class="activelabel"></label>
                                                    </td>
                                                    <td><?php echo $assignedCourse->courseName; ?></td>
                                                    <td><?php echo $assignedCourse->courseID; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="3">There are no courses available.</td>
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
                                <a class="btn btn-success" id="btn_addCourse">
                                    <i class="fa fa-caret-left"></i>&emsp;Add Course&emsp;&emsp;
                                </a>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-danger" id="btn_removeCourse">Remove Course&emsp;
                                    <i class="fa fa-caret-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Courses Available</h3>
                                </div>
                                <div class="panel-body" style="height: 400px;overflow: auto;">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Course Name</th>
                                            <th>Course ID</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (!empty($otherCourses)) {
                                            foreach ($otherCourses as $otherCourse) {
                                                ?>
                                                <form id="otherCoursesForm">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="otherCheck_<?php echo $otherCourse->courseID;?>" value="<?php echo $otherCourse->courseID;?>" class="courseActive otherSelected">
                                                            <label for="otherCheck_<?php echo $otherCourse->courseID; ?>"></label>
                                                        </td>
                                                        <td><?php echo $otherCourse->courseName; ?></td>
                                                        <td><?php echo $otherCourse->courseID; ?></td>
                                                    </tr>
                                                </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //Get courseIDs of all the checked courses in the other courses table and send an array via ajax
    $("#btn_addCourse").click(function() {
        //loop through each checkbox in the table and add checked courseIDs to the array	var otherCourseIDs = [];
        var userID = $(userIDHeader).attr('value');
        var otherCourseIDs = [];

        $('.otherSelected').each(function() {
            if (this.checked == true) {
                otherCourseIDs.push($(this).attr('value'));
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('manageUserCourse/addCourses'); ?>",
            data: {
                courseIDs : otherCourseIDs,
                userID : userID
            },
            success: function(response) {
                location.reload();
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    //Get courseIDs of all the checked courses in the assigned courses table and send an array via ajax
    $("#btn_removeCourse").click(function() {
        //loop through each checkbox in the table and add checked courseIDs to the array
        var userID = $(userIDHeader).attr('value');
        var assignedCourseIDs = [];

        $('.assignedSelected').each(function() {
            if (this.checked == true) {
                assignedCourseIDs.push($(this).attr('value'));
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('manageUserCourse/removeCourses'); ?>",
            data: {
                courseIDs : assignedCourseIDs,
                userID : userID
            },
            success: function(response) {
                location.reload();
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $(document).ajaxStart(function() {
        $("#loader").addClass("loader");
        $(".loader").fadeIn("slow");
    });

    $(document).ajaxStop(function() {
        $(".loader").fadeOut("slow");
    });

</script>
</body>
</html>