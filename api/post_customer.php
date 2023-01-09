<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');
date_default_timezone_set('Asia/Manila');

if (isset($_POST['editcustomer'])) {

    $id = $_POST['editcustomerid'];
    $name = $_POST['editcustomername'];
    $email = $_POST['editcustomeremail'];
    $number = $_POST['editcustomernumber'];


    $validate = "SELECT * FROM  tbl_customer WHERE ( CUSTOMER_NAME = '$name' AND CUSTOMER_EMAIL = '$email' AND CUSTOMER_MOBILE_NUMBER = '$number' )AND CUSTOMER_ID != '$id' ";
    $query_validate = mysqli_query($conn, $validate);






    if (mysqli_num_rows($query_validate) > 0) {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Customer is already exist.";
        header("Location: ../pages/admin_customer.php");
        // echo mysqli_num_rows($query_validate) . "if   ";
        // echo $name . " " . $id . " " . $email . " " . $number;
    } else {

        // echo mysqli_num_rows($query_validate) . "else";

        // echo $name . " " . $id . " " . $email . " " . $number . " " . $email;
        $idaudit =  $_SESSION['user_id']; //id
        $descriptionaudit = "Edited customer id " . $id; // description plus banner name
        $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
        $query_audit = mysqli_query($conn, $audit);
        // CHECK IF THE EXISTING IMAGE IS EQUAL TO IMAGE PAYLOAD, IF YES, DONT UPDATE IMAGE

        $sql = "UPDATE tbl_customer SET CUSTOMER_NAME = '$name',  CUSTOMER_MOBILE_NUMBER = '$number', CUSTOMER_GENDER = '$gender' WHERE CUSTOMER_ID = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Customer updated successfully";
            header("Location: ../pages/admin_customer.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong" . mysqli_error($conn);
            header("Location: ../pages/admin_customer.php");
        }
    }
} else if (isset($_POST['deletecustomer'])) {
    $id = $_POST['customerDelete'];
    $status = 0;

    $sql = "UPDATE tbl_customer SET CUSTOMER_STATUS = '$status' WHERE CUSTOMER_ID = '$id'";
    $result = mysqli_query($conn, $sql);


    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Deleted customer id " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Customer deleted successfully";
        header("Location: ../pages/admin_customer.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_customer.php");
    }
} else if (isset($_POST['addcustomer'])) {

    $name = $_POST['addcustomername'];
    $email = $_POST['addcustomeremail'];
    $number = $_POST['addcustomernumber'];

    $status = 1;

    $validate = "SELECT * FROM  tbl_customer WHERE CUSTOMER_NAME = '$name' AND CUSTOMER_EMAIL = '$email' AND CUSTOMER_MOBILE_NUMBER = '$number' ";
    $query_validate = mysqli_query($conn, $validate);






    if (mysqli_num_rows($query_validate) > 0) {



        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Customer is already exist.";
        header("Location: ../pages/admin_customer.php");
    } else {


        $idaudit =  $_SESSION['user_id']; //id
        $descriptionaudit = "Added customer " . $name; // description plus banner name
        $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
        $query_audit = mysqli_query($conn, $audit);



        $sql = "INSERT INTO tbl_customer (CUSTOMER_NAME, CUSTOMER_EMAIL, CUSTOMER_MOBILE_NUMBER, CUSTOMER_STATUS) VALUES ('$name', '$email', '$number',  '$status')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = 'Customer added successfully';
            header("Location: ../pages/admin_customer.php");
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong" . $conn->error;
            header("Location: ../pages/admin_customer.php");
        }
    }
} else if (isset($_POST['archivecustomer'])) {
    $id = $_POST['customerid'];
    $status = 1;

    $sql = "UPDATE tbl_customer SET CUSTOMER_STATUS = '$status' WHERE CUSTOMER_ID = '$id'";
    $result = mysqli_query($conn, $sql);


    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Retrieved customer id " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Customer retrieved successfully";
        header("Location: ../pages/archive_customer.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/archive_customer.php");
    }
} else if (isset($_POST['feedbackcustomer'])) {
    $id = $_POST['feedbackcustomerid'];
    $content = $_POST['feedbackcontent'];
    $name = $_POST['feedbackcustomername'];
    $picture = $_POST['feedbackcustomerpicture'];
    $status = 1;

    $sql = "INSERT tbl_feedback (FEEDBACK_CONTENT, FEEDBACK_STATUS, CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_PICTURE) VALUES ('$content', '$status', '$id', '$name', '$picture')";
    $result = mysqli_query($conn, $sql);


    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Added feedback of customer id " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Feedback added successfully";
        header("Location: ../pages/admin_feedback.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_feedback.php");
    }
} else if (isset($_POST['editfeedback'])) {
    $cid = $_POST['editcustomerid'];
    $fid = $_POST['editfeedbackid'];
    $content = $_POST['contentedit'];

    $sql = "UPDATE tbl_feedback SET FEEDBACK_CONTENT = '$content' WHERE FEEDBACK_ID = '$fid'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Edited feedback id " . $fid; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Feedback updated successfully";
        header("Location: ../pages/admin_feedback.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_feedback.php");
    }
} else if (isset($_POST['deletefeedback'])) {

    $fid = $_POST['feedbackDelete'];
    $status = 0;

    $sql = "UPDATE tbl_feedback SET FEEDBACK_STATUS = '$content' WHERE FEEDBACK_ID = '$fid'";
    $result = mysqli_query($conn, $sql);


    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Deleted feedback  id" . $fid; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Feedback deleted successfully";
        header("Location: ../pages/admin_feedback.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_feedback.php");
    }
} else if (isset($_POST['archivefeedback'])) {

    $fid = $_POST['feedbackid'];
    $status = 1;

    $sql = "UPDATE tbl_feedback SET FEEDBACK_STATUS = '$status' WHERE FEEDBACK_ID = '$fid'";
    $result = mysqli_query($conn, $sql);


    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Retrieved feedback  id" . $fid; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Feedback retrieved successfully";
        header("Location: ../pages/archive_feedback.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/archive_feedback.php");
    }
} else if (isset($_POST['showstatus']) && isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $usershow = $_POST['showstatus'];
    $descriptionaudit = '';

    if ($usershow == '0') {
        $usershow = '1';
    } else if ($usershow == '1') {
        $usershow = '0';
    }

    $sql = "UPDATE tbl_feedback SET FEEDBACK_SHOW = '$usershow' WHERE FEEDBACK_ID = '$userid'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    if ($usershow == 0) {
        $descriptionaudit = "Deactivate user id " . $userid; // description plus banner name
    } else {
        $descriptionaudit = "Activate user id " . $userid; // description plus banner name
    }

    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);


    if ($query_audit) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Feedback updated successfully";
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
    }
}
