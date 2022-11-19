<?php

include('./admin_home.php');
include('../api/post_product.php');


?>
<div class="div-center flex-col w-full pl-80 pt-10">
    <div class="text-left w-full">
        <button class="addProduct bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
            Add Product
        </button>
    </div>

    <div id="modal-add" class="relative z-[10000] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-primary bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="../api/post_product.php" method="post">
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Add Product</h1>

                        <div class="m-6">
                            <label for="addproductname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                            <input type="text" id="addproductname" name="addproductname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sunsilk" required>
                        </div>
                        <div class="m-6">
                            <label for="addproductdescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                            <textarea type="text" id="addproductdescription" name="addproductdescription" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productdescription" required></textarea>
                        </div>
                        <div class="m-6">
                            <label for="addproductprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
                            <input type="number" id="addproductprice" name="addproductprice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="20" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" name="addproduct" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            <button type="button" onclick="closeModalAdd()" class="text-white m-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-white-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>

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
                    <form action="../api/post_product.php" method="post">
                        <input type="text" id="productid" name="productid" class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Edit Product</h1>

                        <div class="m-6">
                            <label for="productname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                            <input type="text" id="productname" name="productname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sunsilk" required>
                        </div>
                        <div class="m-6">
                            <label for="productdescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                            <textarea type="text" id="productdescription" name="productdescription" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productdescription" required></textarea>
                        </div>
                        <div class="m-6">
                            <label for="productprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
                            <input type="number" id="productprice" name="productprice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="20" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" name="editproduct" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            <button type="button" onclick="closeModal()" class="text-white m-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-white-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>

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
                        <h1 class="font-bold text-primary text-center text-[20px] py-[20px]">Are you sure do want to delete this product?</h1>
                        <input type="text" type="text" id="productidDelete" name="productidDelete" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="productid" required>

                        <div class="text-right">
                            <button type="submit" name="deleteproduct" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            <button type="button" onclick="closeModaldel()" class="text-white m-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-white-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM tbl_product WHERE PRODUCT_STATUS = 1";
    $query_run = mysqli_query($conn, $query);
    ?>
    <table id="example" class="responsive-table ">
        <thead>
            <tr>
                <th style="display: none;">Product ID</th>
                <th>Product Name</th>
                <th>Product Picture</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>DateTime Created</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <tr>
                        <td style="display: none;"><?php echo $row['PRODUCT_ID']; ?> </td>
                        <td><?php echo $row['PRODUCT_NAME']; ?> </td>
                        <td><?php echo $row['PRODUCT_PICTURE']; ?> </td>
                        <td><?php echo $row['PRODUCT_DESCRIPTION']; ?> </td>
                        <td><?php echo $row['PRODUCT_PRICE']; ?> </td>
                        <td><?php echo $row['PRODUCT_DATETIME_CREATED']; ?> </td>
                        <td class="text-center">
                            <button type="button" class="editProduct bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-2 border border-blue-500 hover:border-transparent rounded">
                                <img src="https://img.icons8.com/color/48/null/pencil--v1.png" width="20px" heigh="20px" />
                            </button>
                            <button type="button" class="deleteProduct bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-2 border border-blue-500 hover:border-transparent rounded">
                                <img src="https://img.icons8.com/color/48/null/delete-forever.png" width="20px" heigh="20px" />
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
            $('.editProduct').on('click', function() {
                $("#modal-edit").removeClass("hidden");
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#productid').val(data[0]);
                $('#productname').val(data[1]);
                $('#productdescription').val(data[3]);
                $('#productprice').val(data[4]);

            });
        });

        $(document).ready(function() {
            $('.deleteProduct').on('click', function() {
                $("#modal-delete").removeClass("hidden");
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data[0]);
                $('#productidDelete').val(data[0]);

            });
        });

        $(document).ready(function() {
            $('.addProduct').on('click', function() {
                $("#modal-add").removeClass("hidden");


            });
        });
    </script>
</div>