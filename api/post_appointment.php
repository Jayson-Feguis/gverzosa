<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');
date_default_timezone_set('Asia/Manila');

if (isset($_POST['addappointment'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobilenumber'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $service = $_POST['service'];
    $newDateTime = date('Y-m-d H:i:s', strtotime("$date $time"));
    $service_name = '';
    $descriptive_datetime = date('h:i a', strtotime("$time"));
    $email_subject = "G. Verzosa - Booked an appointment successfully";
    $email_message = "We would like to inform you that your appointment status is PENDING. Wait for the admin to accept your appointment. Thank you for choosing our sevice and have a great day.";

    $sql_service = "SELECT SERVICE_NAME FROM tbl_service WHERE SERVICE_ID = '$service'";
    $result_service = $conn->query($sql_service);
    while ($row = mysqli_fetch_array($result_service)) {
        $service_name = $row['SERVICE_NAME'];
    }

    $text = $descriptive_datetime." ".$fullname." - ".$service_name;

    $sql_appointment = "INSERT tbl_appointment (APP_NAME, APP_EMAIL, APP_MOBILE_NUMBER, START_DATE, END_DATE, TEXT, SERVICE_ID) values ('$fullname', '$email', '$mobile_number', '$newDateTime', '$newDateTime', '$text', '$service')";
    $result = mysqli_query($conn, $sql_appointment);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Added an appointment for " . $fullname; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        $send_email = sendEmail($fullname, $email, $email_subject, $email_message, $mobile_number, $newDateTime, $service_name);
        if ($send_email != 1) {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong - " . $send_email;
            header("Location: ../pages/admin_appointment.php");
        } else if ($send_email == 1) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Appointment added successfully";
            header("Location: ../pages/admin_appointment.php");
        }
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Oops!";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_appointment.php");
    }
} else if (isset($_POST['editappointment'])) {
    $appointmentid = $_POST['editappointmentid'];
    $appointmentfullname = $_POST['editfullname'];
    $appointmentemail = $_POST['editemail'];
    $appointmentmobilenumber = $_POST['editmobilenumber'];
    $date = $_POST['editdate'];
    $time = $_POST['edittime'];
    $appointmentservice = $_POST['editservice'];
    $appointmentremarks = $_POST['editappointmentremarks'];
    $newDateTime = date('Y-m-d H:i:s', strtotime("$date $time"));

    $sql = "UPDATE `tbl_appointment` SET `APP_NAME`='$appointmentfullname',`APP_EMAIL`='$appointmentemail',`APP_MOBILE_NUMBER`='$appointmentmobilenumber',`START_DATE`='$newDateTime',`END_DATE`='$newDateTime',`REMARKS`='$appointmentremarks', `SERVICE_ID`='$appointmentservice' WHERE APP_ID = '$appointmentid'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Updated an appointment id " . $appointmentid; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Appointment updated successfully";
        header("Location: ../pages/admin_appointment.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Error description: " . mysqli_error($conn);
        header("Location: ../pages/admin_appointment.php");
    }
} else if (isset($_POST['acceptappointment'])) {
    $appointmentid = $_POST['appointmentidAccept'];
    $appointmentfullname = $_POST['appointmentfullnameAccept'];
    $appointmentemail = $_POST['appointmentemailAccept'];
    $appointmentremarks = $_POST['appointmentremarksAccept'];
    $accepted_status = 1;
    $email_subject = "G. Verzosa - Your booking is Accepted";
    $email_message = "We would like to inform you that your appointment has been BOOKED. Thank you for choosing our sevice and have a great day.";
    $mobile_number = '';
    $newDateTime = '';
    $service_name = '';

    $sql = "UPDATE tbl_appointment SET APP_STATUS = '$accepted_status', REMARKS = '$appointmentremarks' WHERE APP_ID = '$appointmentid'";
    $result = mysqli_query($conn, $sql);

    $sql_app = "SELECT * FROM tbl_appointment WHERE APP_ID = '$appointmentid' LIMIT 1";
    $result_app = $conn->query($sql_app);
    while ($row = mysqli_fetch_array($result_app)) {
        $mobile_number = $row['APP_MOBILE_NUMBER'];
        $newDateTime = $row['START_DATE'];
        $service_name = $row['SERVICE_ID'];
    }

    $sql_ser = "SELECT * FROM tbl_service WHERE SERVICE_ID = '$service_name' LIMIT 1";
    $result_aser= $conn->query($sql_ser);
    while ($row = mysqli_fetch_array($result_ser)) {
        $service_name = $row['SERVICE_NAME'];
    }

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Accepted an appointment id " . $appointmentid; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result_aser) {
        $send_email = sendEmail($appointmentfullname, $appointmentemail, $email_subject, $email_message, $mobile_number, $newDateTime, $service_name);
        if ($send_email != 1) {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_appointment.php");
        } else if ($send_email == 1) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Appointment accepted successfully";
            header("Location: ../pages/admin_appointment.php");
        }
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_appointment.php");
    }
} else if (isset($_POST['rejectappointment'])) {
    $appointmentid = $_POST['appointmentidReject'];
    $appointmentfullname = $_POST['appointmentfullnameReject'];
    $appointmentemail = $_POST['appointmentemailReject'];
    $appointmentremarks = $_POST['appointmentremarksReject'];
    $reject_status = 2;
    $email_subject = "G. Verzosa - Your booking is Rejected";
    $email_message = "We would like to inform you that your appointment has been REJECTED due to the reason of " . $appointmentremarks . ". Thank you for choosing our sevice and have a great day.";

    $sql = "UPDATE tbl_appointment SET APP_STATUS = '$reject_status', REMARKS = '$appointmentremarks' WHERE APP_ID = '$appointmentid'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Rejected an appointment id " . $appointmentid; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        $send_email = sendEmail($appointmentfullname, $appointmentemail, $email_subject, $email_message);
        if ($send_email != 1) {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_appointment.php");
        } else if ($send_email == 1) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Appointment rejected successfully";
            header("Location: ../pages/admin_appointment.php");
        }
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_appointment.php");
    }
} else if (isset($_POST['cancelappointment'])) {
    $appointmentid = $_POST['appointmentidCancel'];
    $appointmentfullname = $_POST['appointmentfullnameCancel'];
    $appointmentemail = $_POST['appointmentemailCancel'];
    $appointmentremarks = $_POST['appointmentremarksCancel'];
    $cancel_status = 3;
    $email_subject = "G. Verzosa - Your booking is Canceled";
    $email_message = "We would like to inform you that your appointment has been CANCELED due to the reason of " . $appointmentremarks . ". Thank you for choosing our sevice and have a great day.";

    $sql = "UPDATE tbl_appointment SET APP_STATUS = '$cancel_status', REMARKS = '$appointmentremarks' WHERE APP_ID = '$appointmentid'";
    $result = mysqli_query($conn, $sql);

    $idaudit =  $_SESSION['user_id']; //id
    $descriptionaudit = "Cancelled an appointment id " . $appointmentid; // description plus banner name
    $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    $query_audit = mysqli_query($conn, $audit);

    if ($result) {
        $send_email = sendEmail($appointmentfullname, $appointmentemail, $email_subject, $email_message);
        if ($send_email != 1) {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Error";
            $_SESSION['alert-text'] = "Something went wrong";
            header("Location: ../pages/admin_appointment.php");
        } else if ($send_email == 1) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Appointment canceled successfully";
            header("Location: ../pages/admin_appointment.php");
        }
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_appointment.php");
    }
} else if (isset($_POST['deleteappointment'])) {
    $appointmentid = $_POST['appointmentidDelete'];
    $delete_status = 4;

    $sql = "UPDATE tbl_appointment SET APP_STATUS = '$delete_status' WHERE APP_ID = '$appointmentid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Appointment deleted successfully";
        header("Location: ../pages/admin_appointment.php");
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../pages/admin_appointment.php");
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
