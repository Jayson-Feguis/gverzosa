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
    <?php
    if ($_SESSION['user_type'] != 2) {
        echo '<div class="text-left w-full mb-5">
                    <button class="addProduct bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 border border-blue-700 rounded">
                        Add Product
                    </button>
                </div>';
    }
    ?>
    <div id="modal-add" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_product.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Add Product</h1>
                            <label for="addproductimage">Product Image</label>
                            <input type="file" name="addproductimage" id="addproductimage" accept="image/*" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                            <label for="addproductname">Product Name</label>
                            <input type="text" id="addproductname" name="addproductname" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Sunsilk" required>
                            <label for="addproductdescription">Product Description</label>
                            <textarea type="text" id="addproductdescription" name="addproductdescription" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Use for hair" required></textarea>
                            <label for="addproductprice">Product Price</label>
                            <input type="number" id="addproductprice" step="0.01" name="addproductprice" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. 20" required>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="addproduct" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
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
                    <form action="../api/post_product.php" method="post" enctype="multipart/form-data">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <input type="text" id="productid" name="productid" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                            <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Edit Product</h1>
                            <label for="productimage">Product Image</label>
                            <img id="img_productimage" src="" class="w-[200px]">
                            <input type="file" name="productimage" id="productimage" accept="image/*" class="block border border-grey-light w-full p-3 rounded mb-4" required>
                            <input type="text" id="productimagetext" name="productimagetext" class="hidden border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan" required>
                            <label for="productname">Product Name</label>
                            <input type="text" id="productname" name="productname" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="Sunsilk" required>
                            <label for="productdescription">Product Description</label>
                            <textarea type="text" id="productdescription" name="productdescription" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="productdescription" required></textarea>
                            <label for="productprice">Product Price</label>
                            <input type="number" id="productprice" step="0.01" name="productprice" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="20" required>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" name="editproduct" class="inline-flex w-full transition-all duration-300 justify-center rounded-md border border-transparent bg-secondary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
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
                    <form action="../api/post_product.php" method="post">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure do want to archive this product?</h1>
                        <input type="text" type="text" id="productidDelete" name="productidDelete" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <div class="bg-gray-50 px-4 py-3 gap-5 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" name="deleteproduct" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800">Archive</button>
                            <button type="button" onclick="closeModaldel()" class="mt-3 inline-flex w-full transition-all duration-300 justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM tbl_product WHERE PRODUCT_STATUS = 1 ORDER BY PRODUCT_DATETIME_CREATED DESC";
    $query_run = mysqli_query($conn, $query);
    ?>
    <table id="data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th style="display: none;">Product Picture</th>
                <th>Picture</th>
                <th>Description</th>
                <th>Price(₱)</th>
                <th>Date Created</th>
                <?php
                if ($_SESSION['user_type'] != 2) {
                    echo '<th>Actions</th>';
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <td><?php echo $row['PRODUCT_ID']; ?> </td>
                        <td><?php echo $row['PRODUCT_NAME']; ?> </td>
                        <td style="display: none;"><?php echo $row['PRODUCT_PICTURE']; ?></td>
                        <td>
                            <div class="w-[200px] h-[40px] bg-contain bg-no-repeat" style="background-image: url('../images/<?php echo $row['PRODUCT_PICTURE']; ?>');"></div>
                        </td>
                        <td><?php echo $row['PRODUCT_DESCRIPTION']; ?> </td>
                        <td><?php echo $row['PRODUCT_PRICE']; ?> </td>
                        <td><?php echo $row['PRODUCT_DATETIME_CREATED']; ?> </td>
                        <?php
                        if ($_SESSION['user_type'] != 2) {
                            echo '<td>
                                        <button type="button" class="editProduct bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                            <i class="fa fa-pencil text-[16px]" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="deleteProduct bg-transparent hover:bg-gray-300 text-blue-700 font-semibold hover:text-white py-[5px] px-2 border border-gray-500 hover:border-border-gray-300 rounded">
                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                        </button>
                                    </td>';
                        }
                        ?>
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
            $('#data-table tbody').on('click', '.editProduct', function() {
                var data = table.row($(this).parents('tr')).data();
                const dT = new ClipboardEvent('').clipboardData || new DataTransfer();
                dT.items.add(new File(['foo'], data[2]));
                $("#modal-edit").removeClass("hidden");
                productimage.files = dT.files;
                $('#img_productimage').attr("src", "../images/" + data[2]);
                $('#productimagetext').val(data[2]);
                $('#productid').val(data[0]);
                $('#productname').val(data[1]);
                $('#productdescription').val(data[4]);
                $('#productprice').val(parseFloat(data[5]));
            });

            $("#productimage").change(function() {
                $('#productimagetext').val($("#productimage").val());
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
            $('#data-table tbody').on('click', '.deleteProduct', function() {
                var data = table.row($(this).parents('tr')).data();
                $("#modal-delete").removeClass("hidden");
                $('#productidDelete').val(data[0]);
            });

        });

        $(document).ready(function() {
            $('.addProduct').on('click', function() {
                $("#modal-add").removeClass("hidden");
            });
        });
    </script>

    <script>
        // Get the input field
        var input = document.getElementById("productprice");

        // Execute a function when the user releases a key on the keyboard
        input.addEventListener("keyup", function(event) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Check if the input value contains more than 2 decimal places
            if (input.value.indexOf('.') != -1 && input.value.split('.')[1].length > 2) {
                // If it does, truncate the value to 2 decimal places
                input.value = input.value.substring(0, input.value.indexOf('.') + 3);
            }
        });


        var inputs = document.getElementById("addproductprice");

        // Execute a function when the user releases a key on the keyboard
        inputs.addEventListener("keyup", function(events) {
            // Cancel the default action, if needed
            events.preventDefault();
            // Check if the input value contains more than 2 decimal places
            if (inputs.value.indexOf('.') != -1 && inputs.value.split('.')[1].length > 2) {
                // If it does, truncate the value to 2 decimal places
                inputs.value = inputs.value.substring(0, inputs.value.indexOf('.') + 3);
            }
        });
    </script>

</div>