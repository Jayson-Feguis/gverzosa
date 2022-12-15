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

function getCustomerName($id, $conn)
{
    $sql = "SELECT * FROM `tbl_customer` WHERE CUSTOMER_ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row['CUSTOMER_NAME'];
    } else {
        return "Customer not found";
    }
}

?>
<div class="flex-col w-full min-h-screen pl-[270px] mt-[90px] pr-[20px] pb-[150px] overflow-auto">

    <div id="modal-edit" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_customer.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <input type="text" id="editcustomerid" name="editcustomerid" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                            <input type="text" id="editfeedbackid" name="editfeedbackid" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Edit Customer's Feedback</h1>
                            <label for="editcustomername">Content</label>
                            <textarea type="text" id="contentedit" name="contentedit" rows="4" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="Type here ..." required></textarea>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="editfeedback" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                                <button type="button" onclick="closeModal()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-delete" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_customer.php" method="post">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure do want to delete this feedback?</h1>
                        <input type="text" type="text" id="feedbackDelete" name="feedbackDelete" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="deletefeedback" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800">Delete</button>
                            <button type="button" onclick="closeModaldel()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php

    $query = "SELECT * FROM tbl_feedback WHERE FEEDBACK_STATUS = 1 ORDER BY FEEDBACK_ID DESC";
    $query_run = mysqli_query($conn, $query);
    ?>
    <table id="data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Feedback id</th>
                <th>Customer Name</th>
                <th>Feedback</th>
                <th>Date Created</th>
                <th>Show User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <td><?php echo $row['FEEDBACK_ID']; ?> </td>
                        <td><?php echo $row['CUSTOMER_NAME'];  ?> </td>
                        <td><?php echo $row['FEEDBACK_CONTENT']; ?> </td>
                        <td><?php echo $row['FEEDBACK_DATETIME_CREATED']; ?> </td>
                        <td id="user-show-<?php echo $row['FEEDBACK_ID']; ?>">
                            <?php if ($row['FEEDBACK_SHOW'] == 0) {
                                echo '<span class="bg-gray-200 p-2 text-[14px] border border-gray-500 rounded-sm">Deactivated</span>';
                            } else if ($row['FEEDBACK_SHOW'] == 1) {
                                echo '<span class="bg-green-500 text-white p-2 text-[14px] border border-gray-500 rounded-sm">Activated</span>';
                            } ?>
                        </td>

                        <td class="text-center flex items-center gap-1"><label class="inline-flex relative items-center cursor-pointer">
                                <?php if ($row['FEEDBACK_SHOW'] == 0) {
                                    echo ' <input type="checkbox" value="" id="showuser" name="showuser" onclick="showUser(' . $row['FEEDBACK_ID'] . ',' . $row['FEEDBACK_SHOW'] . ')" class="showUser sr-only peer">';
                                } else if ($row['FEEDBACK_SHOW'] == 1) {
                                    echo ' <input type="checkbox" value="" id="showuser" name="showuser" onclick="showUser(' . $row['FEEDBACK_ID'] . ',' . $row['FEEDBACK_SHOW'] . ')" class="showUser sr-only peer" checked>';
                                } ?>

                                <div class="w-11 h-6 peer-focus:outline-none dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                            <button type="button" class="editUser bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-pencil text-[16px]" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="deleteUser bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-trash-o text-[16px]" aria-hidden="true"></i>
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
        function openModal() {
            $("#modal-edit").removeClass("hidden");
        }

        function closeModal() {
            $("#modal-edit").addClass("hidden");
        }

        function closeModaldel() {
            $("#modal-delete").addClass("hidden");
        }

        function closeModalAdd() {
            $("#modal-add").addClass("hidden");
        }

        $(document).ready(function() {

            // TINANGGAL KO KASE DI NACLICLICK YUNG BUTTON PAG NASA PAGE 2 and so on ----------------

            // $('.editProduct').on('click', function() {
            //     $("#modal-edit").removeClass("hidden");
            //     $tr = $(this).closest('tr');
            //     var data = $tr.children("td").map(function() {
            //         return $(this).text();
            //     }).get();
            //     console.log(data);
            //     $('#productid').val(data[0]);
            //     $('#productname').val(data[1]);
            //     $('#productdescription').val(data[3]);
            //     $('#productprice').val(parseFloat(data[4]));

            // });
            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.editFeedback', function() {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-edit").removeClass("hidden");
                $('#editfeedbackid').val(data[0]);
                $('#editcustomerid').val(data[1]);
                $('#contentedit').val(data[2]);
            });
        });

        $(document).ready(function() {

            // TINANGGAL KO KASE DI NACLICLICK YUNG BUTTON PAG NASA PAGE 2 and so on ----------------

            // $('.deleteProduct').on('click', function() {
            //     $("#modal-delete").removeClass("hidden");
            //     $tr = $(this).closest('tr');
            //     var data = $tr.children("td").map(function() {
            //         return $(this).text();
            //     }).get();
            //     console.log(data[0]);
            //     $('#productidDelete').val(data[0]);

            // });

            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.deleteFeedback', function() {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-delete").removeClass("hidden");
                $('#feedbackDelete').val(data[0]);
            });

        });

        $(document).ready(function() {
            $('.addCustomer').on('click', function() {
                $("#modal-add").removeClass("hidden");
            });
        });




        function showUser(id, status) {
            $.ajax({
                url: '../api/post_customer.php',
                type: "POST",
                data: {
                    userid: id,
                    showstatus: status
                },
                success: function(data) {
                    window.location = location;
                }
            });
        }
    </script>
</div>