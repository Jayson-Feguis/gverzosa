<?php
    include_once('../utils/db_config.php');
    include_once('../utils/helper.php');

    if (isset($_POST['editproduct'])) {
        $productid = $_POST['productid'];
        $productimage = $_POST['productimage'];
        $productname = $_POST['productname'];
        $productprice = $_POST['productprice'];
        $productdescription = $_POST['productdescription'];
        $old_image = '';

        $sql_image = "SELECT PRODUCT_PICTURE FROM tbl_product WHERE PRODUCT_ID = '$productid'";
        $res_image = mysqli_query($conn, $sql_image);
        if($sql_image == TRUE){
            $count_image = mysqli_num_rows($res_image);
        }
        if($count_image > 0){
            while($rows_image = mysqli_fetch_assoc($res_image)){
                $old_image = $rows_image['PRODUCT_PICTURE'];
            }
        }

        if($old_image == $productimage && $productimage != ""){
            $sql = "UPDATE tbl_product SET PRODUCT_NAME = '$productname', PRODUCT_PRICE = '$productprice', PRODUCT_DESCRIPTION = '$productdescription' WHERE PRODUCT_ID = '$productid'";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                // SUCCESS
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "success";
                $_SESSION['alert-title'] = "Success";
                $_SESSION['alert-text'] = "Product updated successfully";
                header("Location: ../pages/admin_product.php");
            } else {
                // ERROR
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Something went wrong";
                header("Location: ../pages/admin_product.php");
            }
        }else{
            if(isset($_FILES['productimage']['name'])){
                $upload_image = uploadImage($_FILES['productimage']['name'], $_FILES['productimage']['tmp_name'], "Product");
    
                if(!$upload_image){
                    $_SESSION['alert'] = true;
                    $_SESSION['alert-icon'] = "error";
                    $_SESSION['alert-title'] = "Error";
                    $_SESSION['alert-text'] = "Failed to upload image";
                    header("Location: ../pages/admin_product.php");
                }

                $sql = "UPDATE tbl_product SET PRODUCT_NAME = '$productname', PRODUCT_PICTURE = '$upload_image', PRODUCT_PRICE = '$productprice', PRODUCT_DESCRIPTION = '$productdescription' WHERE PRODUCT_ID = '$productid'";
                $result = mysqli_query($conn, $sql);
        
                if ($result) {
                    // SUCCESS
                    $_SESSION['alert'] = true;
                    $_SESSION['alert-icon'] = "success";
                    $_SESSION['alert-title'] = "Success";
                    $_SESSION['alert-text'] = "Product updated successfully".$productimage;
                    header("Location: ../pages/admin_product.php");
                } else {
                    // ERROR
                    $_SESSION['alert'] = true;
                    $_SESSION['alert-icon'] = "error";
                    $_SESSION['alert-title'] = "Error";
                    $_SESSION['alert-text'] = "Something went wrong";
                    header("Location: ../pages/admin_product.php");
                }
            }
            else{
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "info";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Please upload an image | ".$productimage;
                header("Location: ../pages/admin_product.php");
            }
        }
    } else if (isset($_POST['deleteproduct'])) {
        $productid = $_POST['productidDelete'];
        $productstatus = 0;

        $sql = "UPDATE tbl_product SET PRODUCT_STATUS = '$productstatus' WHERE PRODUCT_ID = '$productid'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Product deleted successfully";
            header("Location: ../pages/admin_product.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_product.php");
        }
    } else if (isset($_POST['addproduct'])) {
        $productname = $_POST['addproductname'];
        $productprice = $_POST['addproductprice'];
        $productdescription = $_POST['addproductdescription'];
        $productstatus = 1;
        if(isset($_FILES['addproductimage']['name'])){
            $upload_image = uploadImage($_FILES['addproductimage']['name'], $_FILES['addproductimage']['tmp_name'], "Product");

            if(!$upload_image){
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Failed to upload image";
                header("Location: ../pages/admin_product.php");
            }

            $sql = "INSERT INTO tbl_product (PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DESCRIPTION, PRODUCT_STATUS, PRODUCT_PICTURE) VALUES ('$productname', '$productprice', '$productdescription', '$productstatus', '$upload_image')";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                // SUCCESS
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "success";
                $_SESSION['alert-title'] = "Success";
                $_SESSION['alert-text'] = 'Product added successfully';
                header("Location: ../pages/admin_product.php");
            } else {
                // ERROR
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Something went wrong";
                header("Location: ../pages/admin_product.php");
            }
           
        }else{
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "info";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Please upload an image";
            header("Location: ../pages/admin_product.php");
        }
    } else if (isset($_POST['retrieveproduct'])) {
        $productid = $_POST['productidArchive'];
        $productstatus = 0;

        $sql = "UPDATE tbl_product SET PRODUCT_STATUS = '$productstatus' WHERE PRODUCT_ID = '$productid'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Product retrieved successfully";
            header("Location: ../pages/admin_product.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_product.php");
        }
    }
?>