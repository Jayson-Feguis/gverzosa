<?php
include('../component/admin/header/header.php');

?>
<?php
if (isset($_SESSION['alert'])) {
    echo "<script>
                Swal.fire({
                    icon: '" . $_SESSION['alert-icon'] . "',
                    title: '" . $_SESSION['alert-title'] . "',
                    text: '" . $_SESSION['alert-text'] . "',
                    showConfirmButton: false
                })
            </script>";
}
unset($_SESSION['alert']);
unset($_SESSION['alert-icon']);
unset($_SESSION['alert-title']);
unset($_SESSION['alert-text']);
function userType($num)
{
    if ($num == 1) {
        return "Administrator";
    } else if ($num == 2) {
        return "Employee";
    }else{
        return "Owner";
    }
}

?>
<div class="flex-col w-full min-h-screen pl-[270px] mt-[90px] pr-[20px] pb-[150px] overflow-auto">

    <div id="modal-archive" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_user.php" method="post">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure do want to restore this user?</h1>
                        <input type="text" type="text" id="userid" name="userid" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="archiveuser" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800">Restore</button>
                            <button type="button" onclick="closeModaldel()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM tbl_user WHERE USER_STATUS = 0 ORDER BY USER_ID DESC";
    $query_run = mysqli_query($conn, $query);
    ?>
    <table id="data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Firstname</th>
                <th style="display: none;">Picture</th>
                <th>Lastname</th>
                <th>Picture</th>
                <th>Username</th>
                <th style="display: none;">Password</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>User Type</th>
                <th style="display: none;">User Type</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <td><?php echo $row['USER_ID']; ?> </td>
                        <td><?php echo $row['USER_FNAME']; ?> </td>
                        <td style="display: none;"><?php echo $row['USER_PICTURE']; ?> </td>
                        <td><?php echo $row['USER_LNAME']; ?> </td>
                        <td>
                            <div class="w-[200px] h-[40px] bg-contain bg-no-repeat" style="background-image: url('../images/<?php echo $row['USER_PICTURE']; ?>');"></div>
                        </td>
                        <td><?php echo $row['USER_USERNAME']; ?> </td>
                        <td style="display: none;"><?php echo $row['USER_PASSWORD']; ?></td>
                        <td><?php echo $row['USER_EMAIL']; ?> </td>
                        <td><?php echo $row['USER_MOBILE_NUMBER']; ?> </td>
                        <td><?php echo userType($row['USER_TYPE']); ?></td>
                        <td style="display: none;"><?php echo $row['USER_TYPE']; ?> </td>
                        <td><?php echo $row['USER_DATETIME_CREATED']; ?> </td>
                        <td class="text-center">
                            <button type="button" class="archivebtn bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-recycle text-[16px]" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "";
            }
            ?>
        </tbody>
    </table>
    <script>
        function closeModaldel() {
            $("#modal-archive").addClass("hidden");
        }


        $(document).ready(function() {


            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.archivebtn', function() {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-archive").removeClass("hidden");
                $('#userid').val(data[0]);
            });

        });
    </script>
</div>