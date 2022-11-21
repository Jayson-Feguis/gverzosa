<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');

if (isset($_POST['edituser'])) {

    $id = $_POST['edituserid'];
    $edituserimage = $_POST['edituserimage'];
    $fname = $_POST['edituserfname'];
    $lname = $_POST['edituserlname'];
    $email = $_POST['edituseremail'];
    $number = $_POST['editusernumber'];
    $username = $_POST['editusername'];
    $password = $_POST['edituserpassword'];
    $type = $_POST['editusertype'];
    $old_image = '';

    $sql_image = "SELECT  FROM tbl_user WHERE USER_ID = '$id'";
    $res_image = mysqli_query($conn, $sql_image);
    if ($sql_image == TRUE) {
        $count_image = mysqli_num_rows($res_image);
    }
    if ($count_image > 0) {
        while ($rows_image = mysqli_fetch_assoc($res_image)) {
            $old_image = $rows_image['USER_PICTURE'];
        }
    }





    // CHECK IF THE EXISTING IMAGE IS EQUAL TO IMAGE PAYLOAD, IF YES, DONT UPDATE IMAGE
    if ($old_image == $edituserimage && $edituserimage != "") {
        $sql = "UPDATE tbl_user SET USER_FNAME '$fname', USER_LNAME = '$lname', USER_MOBILE_NUMBER = '$number', USER_EMAIL = '$email', USER_TYPE = '$type', USER_USERNAME = '$username', USER_PASSWORD = '$password' WHERE USER_ID = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Product updated successfully1";
            header("Location: ../pages/admin_user.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something1 went wrong";
            header("Location: ../pages/admin_user.php");
        }
    }
    // ELSE, UPDATE ALL INFORMATION TOGETHER WITH PRODUCT PICTURE
    else {
        // CHECK IF THERE'S AN IMAGE IN THE PAYLOAD
        if (isset($_FILES['edituserimage']['name'])) {
            // UPLOAD IMAGE
            $upload_image = uploadImage($_FILES['edituserimage']['name'], $_FILES['edituserimage']['tmp_name'], "User");

            if (!$upload_image) {
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Failed to upload image";
                header("Location: ../pages/admin_user.php");
            }

            $sql = "UPDATE tbl_user SET USER_FNAME = '$fname', USER_PICTURE = '$upload_image',  USER_LNAME = '$lname', USER_MOBILE_NUMBER = '$number', USER_EMAIL = '$email', USER_TYPE = '$type', USER_USERNAME = '$username', USER_PASSWORD = '$password' WHERE USER_ID = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // SUCCESS
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "success";
                $_SESSION['alert-title'] = "Success";
                $_SESSION['alert-text'] = "User updated successfully2" . $edituserimage;
                header("Location: ../pages/admin_user.php");
            } else {
                // ERROR
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Something2 went wrong";
                header("Location: ../pages/admin_user.php");
            }
        } else {
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "info";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Please upload an image | " . $edituserimage;
            header("Location: ../pages/admin_user.php");
        }
    }
} else if (isset($_POST['deleteuser'])) {
    $userid = $_POST['userDelete'];
    $userstatus = 0;

    $sql = "UPDATE tbl_user SET USER_STATUS = '$userstatus' WHERE USER_ID = '$userid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "User deleted successfully";
        header("Location: ../pages/admin_user.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_user.php");
    }
} else if (isset($_POST['addcustomer'])) {

    $name = $_POST['addcustomername'];
    $email = $_POST['addcustomername'];
    $number = $_POST['addcustomernumber'];
    $address = $_POST['addcustomeraddress'];
    $gender = $_POST['addcustomergender'];
    $status = 1;

    if (isset($_FILES['addcustomerimage']['name'])) {
        $upload_image = uploadImage($_FILES['addcustomerimage']['name'], $_FILES['addcustomerimage']['tmp_name'], "Customer");

        if (!$upload_image) {
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Failed to upload image";
            header("Location: ../pages/admin_customer.php");
        }

        $sql = "INSERT INTO tbl_customer (CUSTOMER_NAME, CUSTOMER_EMAIL, CUSTOMER_MOBILE_NUMBER, CUSTOMER_GENDER, CUSTOMER_ADDRESS, CUSTOMER_PICTURE, CUSTOMER_STATUS) VALUES ('$name', '$email', '$number', '$gender', '$address', '$upload_image', '$status')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = 'User added successfully';
            header("Location: ../pages/admin_customer.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_customer.php");
        }
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "info";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Please upload an image";
        header("Location: ../pages/admin_customer.php");
    }
} else if (isset($_POST['retrieveuser'])) {
    $userid = $_POST['useridArchive'];
    $userstatus = 1;

    $sql = "UPDATE tbl_user SET USER_STATUS = '$userstatus' WHERE USER_ID = '$productid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "User retrieved successfully";
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
