<?php foreach ($users as $user) { ?>
    <tr>
        <td>
            <a data-toggle="tab" href="#<?php echo $user['userID']; ?>" class="client-link"><?php echo $user['userID']; ?></a>
        </td>
        <td>
            <a href="#"><?php echo $user['fname']; ?></a>
        </td>
        <td>
            <a href="#"><?php echo $user['lname']; ?></a>
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
                    <li>No Groups</li>
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
