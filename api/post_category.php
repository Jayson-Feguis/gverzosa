<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');
date_default_timezone_set('Asia/Manila');

if (isset($_POST['editcategory'])) {
    $id = $_POST['categoryid'];
    $name = $_POST['editcategoryname'];
    $description = $_POST['editcategorydescription'];



    $validate = "SELECT * FROM  tbl_category WHERE CATEGORY_NAME = '$name' AND CATEGORY_ID != '$id'";
    $query_validate = mysqli_query($conn, $validate);

    if (mysqli_num_rows($query_validate) > 0) {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Category is already exist.";
        header("Location: ../pages/admin_category.php");
    } else {
        $sql = "UPDATE tbl_category SET CATEGORY_NAME = '$name',  CATEGORY_DESCRIPTION = '$description' WHERE CATEGORY_ID = '$id'";
        $result = mysqli_query($conn, $sql);


        $idaudit =  $_SESSION['user_id']; //id
        $descriptionaudit = "Edited service category id " . $id; // description plus banner name
        $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
        $query_audit = mysqli_query($conn, $audit);

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
    }
} else if (isset($_POST['deletecategory'])) {
    $id = $_POST['categoryid1'];
    $status = 0;
    $sql = "UPDATE tbl_category SET CATEGORY_STATUS = '$status' WHERE CATEGORY_ID = '$id'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Deleted service category id " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);
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


    // check if service name is existing

    $validate = "SELECT * FROM  tbl_category WHERE CATEGORY_NAME = '$name' ";
    $query_validate = mysqli_query($conn, $validate);

    if (mysqli_num_rows($query_validate) > 0) {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Category is already exist.";
        header("Location: ../pages/admin_category.php");
    } else {
        $sql = "INSERT INTO tbl_category (CATEGORY_NAME, CATEGORY_DESCRIPTION, CATEGORY_STATUS ) VALUES ('$name', '$description', '$status')";
        $result = mysqli_query($conn, $sql);


        $idaudit =  $_SESSION['user_id']; //id
        $descriptionaudit = "Added service category " . $name; // description plus banner name
        $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
        $query_audit = mysqli_query($conn, $audit);
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
    }
} else if (isset($_POST['archivecategory'])) {
    $id = $_POST['categoryid'];
    $status = 1;
    $sql = "UPDATE tbl_category SET CATEGORY_STATUS = '$status' WHERE CATEGORY_ID = '$id'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Retrieved service category id " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Sevice category retrieved successfully";
        header("Location: ../pages/archive_category.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/archive_category.php");
    }
}
