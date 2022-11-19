<?php
    include_once('../utils/db_config.php');

    if (isset($_POST['editproduct'])) {
        $productid = $_POST['productid'];
        $productname = $_POST['productname'];
        $productprice = $_POST['productprice'];
        $productdescription = $_POST['productdescription'];

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

        $sql = "INSERT INTO tbl_product (PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DESCRIPTION, PRODUCT_STATUS) VALUES ('$productname', '$productprice', '$productdescription', '$productstatus')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Product added successfully";
            header("Location: ../pages/admin_product.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
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