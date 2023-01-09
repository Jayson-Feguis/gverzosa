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

?>
<div class="flex-col w-full min-h-screen pl-[270px] mt-[90px] pr-[20px] pb-[150px] overflow-auto">

    <div id="modal-archive" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_category.php" method="post">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure do want to restore this category?</h1>
                        <input type="text" type="text" id="categoryid" name="categoryid" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="archivecategory" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800">Restore</button>
                            <button type="button" onclick="closeModaldel()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM tbl_category WHERE CATEGORY_STATUS = 0 ORDER BY CATEGORY_DATETIME_CREATED DESC";
    $query_run = mysqli_query($conn, $query);
    ?>
    <table id="data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Category Description</th>
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
                        <td><?php echo $row['CATEGORY_ID']; ?></td>
                        <td><?php echo $row['CATEGORY_NAME']; ?></td>
                        <td><?php echo $row['CATEGORY_DESCRIPTION']; ?></td>
                        <td><?php echo $row['CATEGORY_DATETIME_CREATED']; ?> </td>
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
                $('#categoryid').val(data[0]);
            });

        });
    </script>
</div>