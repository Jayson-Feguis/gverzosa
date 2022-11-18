<?php

include('./admin_home.php');
include('../api/post_product.php');
?>
<div class="div-center flex-col w-full pl-80 pt-10">

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
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-2 border border-blue-500 hover:border-transparent rounded">
                                <img src="https://img.icons8.com/color/48/null/pencil--v1.png" width="20px" heigh="20px" />
                            </button>
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-2 border border-blue-500 hover:border-transparent rounded">
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

</div>