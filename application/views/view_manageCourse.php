<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $thisGroup[0]->organisation ?>&emsp;<small>Manage Courses</small></h1>
            </h1>
        </div>

        <div class="row">
            <div class="table-responsive">
                <thead>
                    <tr>
                        <th>Course ID</th>
                        <th>Course Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($assignedCourses as $course) { ?>
                    <tr>
                        <td><?php echo $course->courseID ?></td>
                        <td><?php echo $course->courseName ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </div>
        </div>

    </div>
</div>