<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');
date_default_timezone_set('Asia/Manila');
if (isset($_POST['edituser'])) {

    $id = $_POST['edituserid'];
    $edituserimagetext = $_POST['edituserimagetext'];
    $fname = $_POST['edituserfname'];
    $lname = $_POST['edituserlname'];
    $email = $_POST['edituseremail'];
    $number = $_POST['editusernumber'];
    $username = $_POST['editusername'];
    $password = $_POST['edituserpassword'];
    $type = $_POST['editusertype'];
    $old_image = '';

    $sql_image = "SELECT * FROM tbl_user WHERE USER_ID = '$id'";
    $res_image = mysqli_query($conn, $sql_image);
    if ($res_image) {
        while ($rows_image = mysqli_fetch_assoc($res_image)) {
            $old_image = $rows_image['USER_PICTURE'];
        }
    }


    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Edited user id " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    // CHECK IF THE EXISTING IMAGE IS EQUAL TO IMAGE PAYLOAD, IF YES, DONT UPDATE IMAGE
    if ($old_image == $edituserimagetext && $edituserimagetext != "") {
        $sql = "UPDATE tbl_user SET USER_FNAME = '$fname', USER_LNAME = '$lname', USER_MOBILE_NUMBER = '$number', USER_EMAIL = '$email', USER_TYPE = '$type', USER_USERNAME = '$username', USER_PASSWORD = '$password' WHERE USER_ID = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Product updated successfully";
            header("Location: ../pages/admin_employee.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong" . mysqli_error($conn);
            header("Location: ../pages/admin_employee.php");
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
                header("Location: ../pages/admin_employee.php");
            }

            $sql = "UPDATE tbl_user SET USER_FNAME = '$fname', USER_PICTURE = '$upload_image',  USER_LNAME = '$lname', USER_MOBILE_NUMBER = '$number', USER_EMAIL = '$email', USER_TYPE = '$type', USER_USERNAME = '$username', USER_PASSWORD = '$password' WHERE USER_ID = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // SUCCESS
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "success";
                $_SESSION['alert-title'] = "Success";
                $_SESSION['alert-text'] = "User updated successfully" . $edituserimage;
                header("Location: ../pages/admin_employee.php");
            } else {
                // ERROR
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Something went wrong";
                header("Location: ../pages/admin_employee.php");
            }
        } else {
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "info";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Please upload an image | " . $edituserimage;
            header("Location: ../pages/admin_employee.php");
        }
    }
} else if (isset($_POST['deleteuser'])) {
    $userid = $_POST['userDelete'];
    $userstatus = 0;

    $sql = "UPDATE tbl_user SET USER_STATUS = '$userstatus' WHERE USER_ID = '$userid'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Deleted user id " . $userid; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "User deleted successfully";
        header("Location: ../pages/admin_employee.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_employee.php");
    }
} else if (isset($_POST['adduser'])) {

    $fname = $_POST['adduserfname'];
    $lname =  $_POST['adduserlname'];
    $email =  $_POST['adduseremail'];
    $number = $_POST['addusernumber'];
    $username =  $_POST['addusername'];
    $password =  $_POST['adduserpassword'];
    $type = $_POST['adusertype'];
    $user_show = 0;

    if($type == 1 || $type == 3 || $type == '1' || $type == '3' ){
        $user_show = 1;
    }

    $status = 1;


    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Added user " . $fname . ' ' . $lname; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    // check username if existing 
    $sqlusername = "SELECT * FROM tbl_user WHERE USER_USERNAME = '$username'";
    $resultusername = mysqli_query($conn, $sqlusername);
    if (mysqli_num_rows($resultusername) > 0) {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Username already exist";
        header("Location: ../pages/admin_employee.php");
    } else {

        if (isset($_FILES['adduserimage']['name'])) {
            $upload_image = uploadImage($_FILES['adduserimage']['name'], $_FILES['adduserimage']['tmp_name'], "User");

            if (!$upload_image) {
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Failed to upload image";
                header("Location: ../pages/admin_employee.php");
            }

            $sql = "INSERT INTO tbl_user (USER_FNAME, USER_LNAME, USER_EMAIL, USER_MOBILE_NUMBER, USER_USERNAME, USER_PASSWORD, USER_TYPE, USER_PICTURE, USER_STATUS, USER_SHOW) VALUES ('$fname', '$lname', '$email', '$number', '$username', '$password', '$type', '$upload_image', '$status', '$user_show')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // SUCCESS
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "success";
                $_SESSION['alert-title'] = "Success";
                $_SESSION['alert-text'] = 'User added successfully';
                header("Location: ../pages/admin_employee.php");
            } else {
                // ERROR
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Something went wrong";
                header("Location: ../pages/admin_employee.php");
            }
        } else {
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "info";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Please upload an image";
            header("Location: ../pages/admin_employee.php");
        }
    }
} else if (isset($_POST['archiveuser'])) {
    $userid = $_POST['userid'];
    $userstatus = 1;

    $sql = "UPDATE tbl_user SET USER_STATUS = '$userstatus' WHERE USER_ID = '$userid'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Retrieved user id " . $userid; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);


    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "User retrieved successfully";
        header("Location: ../pages/archive_user.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/archive_user.php");
    }
}
else if (isset($_POST['showstatus']) && isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $usershow = $_POST['showstatus'];
    $descriptionaudit = '';

    if($usershow == '0'){
        $usershow = '1';
    }else if($usershow == '1'){
        $usershow = '0';
    }

    $sql = "UPDATE tbl_user SET USER_SHOW = '$usershow' WHERE USER_ID = '$userid'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    if($usershow == 0){
        $descriptionaudit = "Deactivate user id " . $userid; // description plus banner name
    }else{
        $descriptionaudit = "Activate user id " . $userid; // description plus banner name
    }
    
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);


    if ($query_audit) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "User updated successfully";
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
    }
}
// else{
//      // ERROR
//      $_SESSION['alert'] = true;
//      $_SESSION['alert-icon'] = "error";
//      $_SESSION['alert-title'] = "Error";
//      $_SESSION['alert-text'] = "Something went wrong";
//      header("Location: ../pages/archive_user.php");
// }
