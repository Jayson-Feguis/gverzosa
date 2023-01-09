<?php
include('../component/admin/header/header.php');
?>
<?php

function getUserName($id, $conn)
{
    $sql = "SELECT * FROM `tbl_user` WHERE USER_ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row['USER_FNAME'] . ' ' . $row['USER_LNAME'];
    } else {
        return "User not found";
    }
}

?>
<div class="flex-col w-full min-h-screen pl-[270px] mt-[90px] pr-[20px] pb-[150px] overflow-auto">

    <?php

    $query = "SELECT * FROM tbl_audit ORDER BY AUDIT_ID DESC ";
    $query_run = mysqli_query($conn, $query);
    ?>
    <table id="data-table-audit" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Log ID</th>
                <th>User</th>
                <th>Activity</th>
                <th>Date Created</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <td><?php echo $row['AUDIT_ID']; ?> </td>
                        <td><?php echo getUserName($_SESSION['user_id'], $conn); ?> </td>
                        <td><?php echo $row['AUDIT_ACTIVITY']; ?> </td>
                        <td><?php echo $row['AUDIT_DATETIME_CREATED']; ?> </td>

                    </tr>
            <?php
                }
            } else {
                echo "";
            }
            ?>
        </tbody>
    </table>

</div>