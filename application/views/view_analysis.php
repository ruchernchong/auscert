<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Course Analysis</h1>
                <h4><?php echo $course->courseName ?></h4>

                <h3>Users Enrolled</h3>
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>UserID</th>
                            <th>User Name</th>
                            <th>Completion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (is_array($courseUsers)) {
                        foreach ($courseUsers as $courseUser) { ?>
                            <tr>
                                <td><?php echo $courseUser->userID ?></td>
                                <td><?php echo $courseUser->username ?></td>
                                <td><?php echo $courseUser->completion ?></td>
                            </tr>
                            <?php
                        };
                    } else {
                        echo "<tr><td>" . $courseUsers . "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>

                <h3>Users Completed</h3>
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>UserID</th>
                        <th>User Name</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (is_array($completedUsers)) {
                        foreach ($completedUsers as $completedUser) { ?>
                            <tr>
                                <td><?php echo $completedUser->userID ?></td>
                                <td><?php echo $completedUser->username ?></td>
                                <td><?php echo 'Score here' ?></td>
                            </tr>
                            <?php
                        };
                    } else {
                        echo "<tr><td>" . $completedUsers . "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">


            </div>
        </div>
    </div>
</div>




<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('#pageAdmin').removeAttr('href');
    });
</script>
</body>
</html>