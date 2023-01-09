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
    <div class="text-left w-full mb-5">
        <button class="addCustomer bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 border border-blue-700 rounded">
            Add Customer
        </button>
    </div>
    <div id="modal-add" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_customer.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Add Customer</h1>
                            <label for="addcustomername">Customer Name</label>
                            <input type="text" id="addcustomername" name="addcustomername" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan delacruz" required>
                            <label for="addcustomeremail">Email</label>
                            <input type="email" id="addcustomeremail" name="addcustomeremail" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan@gmail.com" required>
                            <label for="addcustomernumber">Mobile Number</label>
                            <div class='relative w-full'>
                                <div class='absolute top-0 left-0 h-full div-center pl-3 pr-2'>
                                    +63
                                </div>
                                <input type="phone" id="addcustomernumber" name="addcustomernumber" class="block border border-grey-light w-full p-3 rounded mb-4 pl-12" placeholder="9123456789" pattern="[9]{1}[0-9]{9}" maxlength="10" required>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="addcustomer" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                                <button type="button" onclick="closeModalAdd()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-edit" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_customer.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <input type="text" id="editcustomerid" name="editcustomerid" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Edit Customer</h1>

                            <label for="editcustomername">Customer Name</label>
                            <input type="text" id="editcustomername" name="editcustomername" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                            <label for="editcustomeremail">Email</label>
                            <input type="email" id="editcustomeremail" name="editcustomeremail" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                            <label for="editcustomernumber">Mobile Number</label>
                            <div class='relative w-full'>
                                <div class='absolute top-0 left-0 h-full div-center pl-3 pr-2'>
                                    +63
                                </div>
                                <input type="phone" id="editcustomernumber" name="editcustomernumber" class="block border border-grey-light w-full p-3 rounded mb-4 pl-12" placeholder="9123456789" pattern="[9]{1}[0-9]{9}" maxlength="10" required>
                            </div>


                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="editcustomer" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
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
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure do want to archive this customer?</h1>
                        <input type="text" type="text" id="customerDelete" name="customerDelete" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="deletecustomer" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800">Archive</button>
                            <button type="button" onclick="closeModaldel()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-feedback" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_customer.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <input type="text" id="customerfeedbackid" name="feedbackcustomerid" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="userid" required>
                            <input type="text" id="customerfeedbackname" name="feedbackcustomername" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required>
                            <input type="text" id="feedbackcustomerpicture" name="feedbackcustomerpicture" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required>

                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Customer's Feedback</h1>
                            <label for="feedbackcontent">Feedback Content</label>
                            <textarea type="text" id="feedbackcontent" name="feedbackcontent" rows="4" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="Type here ..." required></textarea>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="feedbackcustomer" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                                <button type="button" onclick="closeFeedbackModal()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM tbl_customer WHERE CUSTOMER_STATUS = 1 ORDER BY CUSTOMER_ID DESC";
    $query_run = mysqli_query($conn, $query);
    ?>
    <table id="data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Date Created</th>
                <th>Actions</th>
                <th style="display: none;">num</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($query_run) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <td><?php echo $row['CUSTOMER_ID']; ?> </td>
                        <td><?php echo $row['CUSTOMER_NAME']; ?> </td>
                        <td><?php echo $row['CUSTOMER_EMAIL']; ?> </td>
                        <td>0<?php echo $row['CUSTOMER_MOBILE_NUMBER']; ?> </td>

                        <td><?php echo $row['CUSTOMER_DATETIME_CREATED']; ?> </td>
                        <td class="text-center w-[150px]">
                            <button type="button" class="editCustomer bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-pencil text-[16px]" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="deleteCustomer bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-archive" aria-hidden="true"></i>
                            </button>
                            <!-- <button type="button" class="feedbackCustomer bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-comment text-[16px]" aria-hidden="true"></i>
                            </button> -->
                        </td>
                        <td style="display: none;"><?php echo $row['CUSTOMER_MOBILE_NUMBER']; ?> </td>
                    </tr>
            <?php
                }
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

        function closeFeedbackModal() {
            $("#modal-feedback").addClass("hidden");
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
            $('#data-table tbody').on('click', '.editCustomer', function() {
                var data = table.row($(this).parents('tr')).data();

                $("#modal-edit").removeClass("hidden");

                console.log($('#editcustomeremail').val(data[2]))
                $('#editcustomerid').val(data[0]);
                $('#editcustomername').val(data[1]);
                $('#editcustomeremail').val(data[2]);
                $('#editcustomernumber').val(data[6]);

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
            $('#data-table tbody').on('click', '.deleteCustomer', function() {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-delete").removeClass("hidden");
                $('#customerDelete').val(data[0]);
            });

        });

        $(document).ready(function() {
            $('.addCustomer').on('click', function() {
                $("#modal-add").removeClass("hidden");
            });
        });

        $(document).ready(function() {

            var table = $('#data-table').DataTable();
            $('#data-table tbody').on('click', '.feedbackCustomer', function() {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-feedback").removeClass("hidden");
                $('#customerfeedbackid').val(data[0]);
                $('#customerfeedbackname').val(data[1]);
                $('#feedbackcustomerpicture').val(data[2]);


            });
        });
    </script>
</div>