<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');

if (isset($_POST['editcustomer'])) {

    $id = $_POST['editcustomerid'];
    $editcustomerimagetext = $_POST['editcustomerimagetext'];
    $name = $_POST['editcustomername'];
    $email = $_POST['editcustomername'];
    $number = $_POST['editcustomernumber'];
    $address = $_POST['editcustomeraddress'];
    $gender = $_POST['editcustomergender'];
    $old_image = '';

    $sql_image = "SELECT * FROM tbl_customer WHERE CUSTOMER_ID = '$id'";
    $res_image = mysqli_query($conn, $sql_image);
    if ($res_image) {
        while ($rows_image = mysqli_fetch_assoc($res_image)) {
            $old_image = $rows_image['CUSTOMER_PICTURE'];
        }
    }



    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Edited customer id " . $id; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);
    // CHECK IF THE EXISTING IMAGE IS EQUAL TO IMAGE PAYLOAD, IF YES, DONT UPDATE IMAGE
    if ($old_image ==  $editcustomerimagetext &&  $editcustomerimagetext != "") {
        $sql = "UPDATE tbl_customer SET CUSTOMER_NAME = '$name', CUSTOMER_ADDRESS = '$address', CUSTOMER_MOBILE_NUMBER = '$number', CUSTOMER_GENDER = '$gender' WHERE CUSTOMER_ID = '$id'";
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
            $_SESSION['alert-text'] = "Something1 went wrong" . mysqli_error($conn);
            header("Location: ../pages/admin_customer.php");
        }
    }
    // ELSE, UPDATE ALL INFORMATION TOGETHER WITH PRODUCT PICTURE
    else {
        // CHECK IF THERE'S AN IMAGE IN THE PAYLOAD
        if (isset($_FILES['editcustomerimage']['name'])) {
            // UPLOAD IMAGE
            $upload_image = uploadImage($_FILES['editcustomerimage']['name'], $_FILES['editcustomerimage']['tmp_name'], "Customer");

            if (!$upload_image) {
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Failed to upload image";
                header("Location: ../pages/admin_customer.php");
            }

            $sql = "UPDATE tbl_customer SET CUSTOMER_PICTURE = '$upload_image', CUSTOMER_NAME = '$name', CUSTOMER_ADDRESS = '$address', CUSTOMER_MOBILE_NUMBER = '$number', CUSTOMER_GENDER = '$gender' WHERE CUSTOMER_ID = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // SUCCESS
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "success";
                $_SESSION['alert-title'] = "Success";
                $_SESSION['alert-text'] = "Customer updated successfully" . $editcustomerimagetext;
                header("Location: ../pages/admin_customer.php");
            } else {
                // ERROR
                $_SESSION['alert'] = true;
                $_SESSION['alert-icon'] = "error";
                $_SESSION['alert-title'] = "Error";
                $_SESSION['alert-text'] = "Something2 went wrong";
                header("Location: ../pages/admin_customer.php");
            }
        } else {
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "info";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Please upload an image";
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
    $address = $_POST['addcustomeraddress'];
    $gender = $_POST['addcustomergender'];
    $status = 1;

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Added customer " . $name; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

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
            $_SESSION['alert-text'] = "Something went wrong" . $conn->error;
            header("Location: ../pages/admin_customer.php");
        }
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "info";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Please upload an image";
        header("Location: ../pages/admin_customer.php");
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
    $status = 1;
    $sql = "INSERT tbl_feedback (FEEDBACK_CONTENT, FEEDBACK_STATUS, CUSTOMER_ID) VALUES ('$content', '$status', '$id')";
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
}
