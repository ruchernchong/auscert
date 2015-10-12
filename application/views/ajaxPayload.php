<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Username</th>
            <th>Groups</th>
            <th>User Type</th>
            <th>Email Address</th>
            <th>Contact No.</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td class="client-avatar">
                    <img alt="image" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>">&emsp;<a data-toggle="tab" href="#<?php echo $user['userID']; ?>" class="client-link"><?php echo $user['fname']; ?></a>
                </td>
                <td>
                    <?php
                    $userArrays = $user['groupArray'];
                    if (!empty($userArrays)) {
                        foreach ($userArrays as $userArray) {
                            ?>
                            <ul>
                                <li>
                                    <a href="#"><?php echo $userArray['organisation']; ?></a>
                                </li>
                            </ul>
                            <?php
                        }
                    } else {
                        ?>
                        <ul>
                            <li>User does not belong to any group(s)</li>
                        </ul>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <span data-toggle="tooltip" title="Any suggestion what would you prefer for this? Right now I am using 'userType' from the database."><?php echo $user['usertype']; ?></span>
                </td>
                <td>
                    <i class="fa fa-envelope"></i>&emsp;<a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a>
                </td>
                <td>
                    <i class="fa fa-phone"></i>&emsp;<a href="tel:<?php echo $user['contact']; ?>"><?php echo $user['contact']; ?></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>