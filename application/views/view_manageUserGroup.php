<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 id="userIDHeader" value="<?php echo $thisUser->userID; ?>" class="page-header">
                    <?php echo $thisUser->fname . " " . $thisUser->lname; ?>&nbsp;
                    <small>Manage Groups</small>
                </h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div class="col-lg-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Groups User is Enrolled In</h3>
                                </div>
                                <div class="panel-body" style="height: 400px;overflow: auto;">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Group Name</th>
                                            <th>Group ID</th>
                                        </tr>
                                        </thead>
                                        <tbody id="leftGroupPanel">
                                        <?php
                                        if (!empty($assignedGroups)) {
                                            foreach($assignedGroups as $assignedGroup) {?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" id="assignedChecked_<?php echo $assignedGroup['groupID']; ?>" value="<?php echo $assignedGroup['groupID'];?>" class="customCheckBox assignedSelected">
                                                        <label for="assignedChecked_<?php echo $assignedGroup['groupID']; ?>" class="activelabel"></label>
                                                    </td>
                                                    <td><?php echo $assignedGroup['organisation']; ?></td>
                                                    <td><?php echo $assignedGroup['groupID']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="3">There are no groups available.</td>
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
                                <a class="btn btn-success" id="btn_addGroup">
                                    <i class="fa fa-caret-left"></i>&emsp;Add Group&emsp;&emsp;
                                </a>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-danger" id="btn_removeGroup">Remove Group&emsp;
                                    <i class="fa fa-caret-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Groups Available</h3>
                                </div>
                                <div class="panel-body" style="height: 400px;overflow: auto;">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Group Name</th>
                                            <th>Group ID</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (!empty($otherGroups)) {
                                            foreach ($otherGroups as $otherGroup) {
                                                ?>
                                                <form id="otherGroupsForm">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="otherCheck_<?php echo $otherGroup->groupID;?>" value="<?php echo $otherGroup->groupID;?>" class="customCheckBox otherSelected">
                                                            <label for="otherCheck_<?php echo $otherGroup->groupID; ?>"></label>
                                                        </td>
                                                        <td><?php echo $otherGroup->organisation; ?></td>
                                                        <td><?php echo $otherGroup->groupID; ?></td>
                                                    </tr>
                                                </form>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="2">There are no groups available.</td>
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
    //Get groupIDs of all the checked groups in the other groups table and send an array via ajax
    $("#btn_addGroup").click(function() {
        //loop through each checkbox in the table and add checked groupIDs to the array
        var userID = $(userIDHeader).attr('value');
        var otherGroupIDs = [];

        $('.otherSelected').each(function() {
            if (this.checked == true) {
                otherGroupIDs.push($(this).attr('value'));
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('manageUserGroup/addGroup'); ?>",
            data: {
                groupIDs : otherGroupIDs,
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

    //Get groupIDs of all the checked groups in the assigned groups table and send an array via ajax
    $("#btn_removeGroup").click(function() {
        //loop through each checkbox in the table and add checked groupIDs to the array
        var userID = $(userIDHeader).attr('value');
        var assignedGroupIDs = [];

        $('.assignedSelected').each(function() {
            if (this.checked == true) {
                assignedGroupIDs.push($(this).attr('value'));
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('manageUserGroup/removeGroup'); ?>",
            data: {
                groupIDs : assignedGroupIDs,
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