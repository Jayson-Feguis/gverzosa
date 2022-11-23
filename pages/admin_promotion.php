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
        <button class="addPromotion bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 border border-blue-700 rounded">
            Add Promotion
        </button>
    </div>
    <div id="modal-add" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_promotion.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Add Promotion</h1>
                            <label for="addpromotionimage">Promotion Image</label>
                            <input type="file" name="addpromotionimage" id="addpromotionimage" accept="image/*" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                            <label for="addpromotionname">Promotion Name</label>
                            <input type="text" id="addpromotionname" name="addpromotionname" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Promo" required>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="addpromotion" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
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
                    <form action="../api/post_promotion.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <input type="text" id="promotionid" name="promotionid" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="promotionid" required>
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Edit Promotion</h1>
                            <label for="promotionimage">Promotion Image</label>
                            <img id="img_promotionimage" src="" class="w-[200px]">
                            <input type="file" name="promotionimage" id="promotionimage" accept="image/*" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                            <label for="promotionname">Promotion Name</label>
                            <input type="text" id="promotionname" name="promotionname" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="editpromotion" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
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
                    <form action="../api/post_promotion.php" method="post">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px] px-[10px]">Are you sure do want to delete this promotion?</h1>
                        <input type="text" type="text" id="promotionidDelete" name="promotionidDelete" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="deletepromotion" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800">Delete</button>
                            <button type="button" onclick="closeModaldel()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM tbl_banner WHERE BANNER_STATUS = 1 ORDER BY BANNER_DATETIME_CREATED DESC";
    $query_run = mysqli_query($conn, $query);
    ?>
    <table id="data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th style="display: none;">Promotion ID</th>
                <th>Promotion Name</th>
                <th style="display: none;">Product Picture</th>
                <th>Promotion Picture</th>
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
                        <td style="display: none;"><?php echo $row['BANNER_ID']; ?></td>
                        <td><?php echo $row['BANNER_NAME']; ?></td>
                        <td style="display: none;"><?php echo $row['BANNER_IMAGE']; ?></td>
                        <td>
                            <div class="w-[200px] h-[40px] bg-contain bg-no-repeat" style="background-image: url('../images/<?php echo $row['BANNER_IMAGE']; ?>');"></div>
                        </td>
                        <td><?php echo $row['BANNER_DATETIME_CREATED']; ?> </td>
                        <td class="text-center">
                            <button type="button" class="editPromotion bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-pencil text-[16px]" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="deletePromotion bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                <i class="fa fa-trash-o text-[16px]" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "No record found";
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
            $('#data-table tbody').on('click', '.editPromotion', function() {
                var data = table.row($(this).parents('tr')).data();
                const dT = new ClipboardEvent('').clipboardData || new DataTransfer();
                dT.items.add(new File(['foo'], data[2]));
                $("#modal-edit").removeClass("hidden");
                promotionimage.files = dT.files;
                $('#img_promotionimage').attr("src", "../images/" + data[2]);
                $('#promotionid').val(data[0]);
                $('#promotionname').val(data[1]);

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
            $('#data-table tbody').on('click', '.deletePromotion', function() {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-delete").removeClass("hidden");
                $('#promotionidDelete').val(data[0]);
            });

        });

        $(document).ready(function() {
            $('.addPromotion').on('click', function() {
                $("#modal-add").removeClass("hidden");
            });
        });
    </script>
</div>