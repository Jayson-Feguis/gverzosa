<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');

if (isset($_POST['editservice'])) {
    $id = $_POST['serviceid'];
    $image = $_POST['serviceimagetext'];
    $name = $_POST['servicename'];
    $price = $_POST['serviceprice'];
    $category = $_POST['servicecategory'];
    $old_image = '';

    $sql_image = "SELECT SERVICE_PICTURE FROM tbl_service WHERE SERVICE_ID = '$id'";
    $res_image = mysqli_query($conn, $sql_image);
    if ($res_image) {
        while ($rows_image = mysqli_fetch_assoc($res_image)) {
            $old_image = $rows_image['SERVICE_PICTURE'];
        }
    }

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Edited service sub category " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);
    // CHECK IF THE EXISTING IMAGE IS EQUAL TO IMAGE PAYLOAD, IF YES, DONT UPDATE IMAGE
    if ($old_image == $image &&  $image != "") {
        $sql = "UPDATE tbl_service SET SERVICE_NAME = '$name',  SERVICE_PRICE = '$price', CATEGORY_ID = '$category' WHERE SERVICE_ID = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Service updated successfully";
            header("Location: ../pages/admin_service.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_service.php");
        }
    }
    // ELSE, UPDATE ALL INFORMATION TOGETHER WITH PRODUCT PICTURE
    else {
        // CHECK IF THERE'S AN IMAGE IN THE PAYLOAD
        if (isset($_FILES['serviceimage']['name'])) {
            // UPLOAD IMAGE
            $upload_image = uploadImage($_FILES['serviceimage']['name'], $_FILES['serviceimage']['tmp_name'], "Service");

            if (!$upload_image) {
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Failed to upload image";
                header("Location: ../pages/admin_service.php");
            }

            $sql = "UPDATE tbl_service SET SERVICE_NAME = '$name',  SERVICE_PRICE = '$price', CATEGORY_ID = '$category', SERVICE_PICTURE = '$upload_image' WHERE SERVICE_ID = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // SUCCESS
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "success";
                $_SESSION['alert-title'] = "Success";
                $_SESSION['alert-text'] = "Service updated successfully";
                header("Location: ../pages/admin_service.php");
            } else {
                // ERROR
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Something went4 wrong";
                header("Location: ../pages/admin_service.php");
            }
        } else {
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "info";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Please upload an image";
            header("Location: ../pages/admin_service.php");
        }
    }
} else if (isset($_POST['deleteservice'])) {
    $id = $_POST['serviceidDelete'];
    $status = 0;

    $sql = "UPDATE tbl_service SET SERVICE_STATUS = '$status' WHERE SERVICE_ID = '$id'";
    $result = mysqli_query($conn, $sql);


    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Deleted service sub category id " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);
    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Service deleted successfully";
        header("Location: ../pages/admin_service.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_service.php");
    }
} else if (isset($_POST['addservice'])) {

    $service = $_POST['addservicename'];
    $category =  $_POST['addservicecategory'];
    $price =  $_POST['addserviceprice'];
    $status = 1;


    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Added service sub category " . $service; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);
    if (isset($_FILES['addserviceimage']['name'])) {
        $upload_image = uploadImage($_FILES['addserviceimage']['name'], $_FILES['addserviceimage']['tmp_name'], "Service");

        if (!$upload_image) {
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Failed to upload image";
            header("Location: ../pages/admin_service.php");
        }

        $sql = "INSERT INTO tbl_service (SERVICE_NAME, CATEGORY_ID, SERVICE_PRICE, SERVICE_STATUS, SERVICE_PICTURE ) VALUES ('$service', '$category', '$price', '$status' ,'$upload_image')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = 'Service added successfully';
            header("Location: ../pages/admin_service.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_service.php");
        }
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "info";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Please upload an image";
        header("Location: ../pages/admin_service.php");
    }
} else if (isset($_POST['archiveservice'])) {
    $id = $_POST['serviceid'];
    $status = 1;

    $sql = "UPDATE tbl_service SET SERVICE_STATUS = '$status' WHERE SERVICE_ID = '$id'";
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
        $_SESSION['alert-text'] = "Service retrieved successfully";
        header("Location: ../pages/archive_service.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/archive_service.php");
    }
}
