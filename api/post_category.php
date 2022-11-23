<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');

if (isset($_POST['editcategory'])) {
    $id = $_POST['categoryid'];
    $name = $_POST['editcategoryname'];
    $description = $_POST['editcategorydescription'];

    $sql = "UPDATE tbl_category SET CATEGORY_NAME = '$name',  CATEGORY_DESCRIPTION = '$description' WHERE CATEGORY_ID = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Category updated successfully";
        header("Location: ../pages/admin_category.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_category.php");
    }
} else if (isset($_POST['deletecategory'])) {
    $id = $_POST['categoryid1'];
    $status = 0;
    $sql = "UPDATE tbl_category SET CATEGORY_STATUS = '$status' WHERE CATEGORY_ID = '$id'";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Category deleted successfully";
        header("Location: ../pages/admin_category.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_category.php");
    }
} else if (isset($_POST['addcategory'])) {
    $name = $_POST['addcategoryname'];
    $description = $_POST['addcategorydescription'];
    $status = 1;
    $sql = "INSERT INTO tbl_category (CATEGORY_NAME, CATEGORY_DESCRIPTION, CATEGORY_STATUS ) VALUES ('$name', '$description', '$status')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = 'Category added successfully';
        header("Location: ../pages/admin_category.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_category.php");
    }
} else if (isset($_POST['retrieveproduct'])) {
    $productid = $_POST['productidArchive'];
    $productstatus = 1;

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
