<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 id="groupIDHeader" value="<?php echo $thisGroup['groupID']; ?>" class="page-header">
                    <?php echo $thisGroup['organisation']; ?>&nbsp;
                    <small>Manage Members</small>
                </h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div class="col-lg-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Members Assigned to This Group</h3>
                                </div>
                                <div class="panel-body" style="height: 400px;overflow: auto;">
                                    <table class="table table-striped table-hover">
                                        <?php
                                        if (!empty($groupUsers)) {
                                        ?>
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>User ID</th>
                                            <th>User Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($groupUsers as $groupUser) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="assignedChecked_<?php echo $groupUser['userID']; ?>" value="<?php echo $groupUser['userID'];?>" class="courseActive assignedSelected">
                                                    <label for="assignedChecked_<?php echo $groupUser['userID']; ?>" class="activelabel"></label>
                                                </td>
                                                <td><?php echo $groupUser['userID']; ?></td>
                                                <td><?php echo $groupUser['email']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="3">There are no member(s) in this group.</td>
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
                                <a class="btn btn-success" id="btn_addUser">
                                    <i class="fa fa-caret-left"></i>&emsp;Add User&emsp;&emsp;
                                </a>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-danger" id="btn_removeUser">Remove User&emsp;
                                    <i class="fa fa-caret-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">All Members</h3>
                                </div>
                                <div class="panel-body" style="height: 400px;overflow: auto;">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>User ID</th>
                                            <th>User Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (!empty($otherUsers)) {
                                            foreach ($otherUsers as $otherUser) {
                                                ?>
                                                <form id="otherUsersForm">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="otherCheck_<?php echo $otherUser->userID;?>" value="<?php echo $otherUser->userID;?>" class="courseActive otherSelected">
                                                            <label for="otherCheck_<?php echo $otherUser->userID; ?>"></label>
                                                        </td>
                                                        <td><?php echo $otherUser->userID; ?></td>
                                                        <td><?php echo $otherUser->email; ?></td>
                                                    </tr>
                                                </form>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="2">There are no users in this group.</td>
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
    /**
     * Created by RuChern on 28 Sep 2015.
     */

    $("#btn_addUser").click(function() {
        //loop through each checkbox in the table and add checked userIDs to the array
        var groupID = $("#groupIDHeader").attr('value');
        var otherUserIDs = [];

        $('.otherSelected').each(function() {
            if (this.checked == true) {
                otherUserIDs.push($(this).attr('value'));
            }
        });

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('manageMember/addMembers'); ?>",
            data: {
                userIDs : otherUserIDs,
                groupID : groupID
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


    $("#btn_removeUser").click(function() {
        //loop through each checkbox in the table and add checked userIDs to the array
        var groupID = $("#groupIDHeader").attr('value');
        var assignedUserIDs = [];

        $('.assignedSelected').each(function() {
            if (this.checked == true) {
                assignedUserIDs.push($(this).attr('value'));
            }
        });

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('manageMember/removeMembers'); ?>",
            data: {
                userIDs : assignedUserIDs,
                groupID : groupID
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