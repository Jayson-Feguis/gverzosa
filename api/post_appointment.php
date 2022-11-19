<?php
    include_once('../utils/db_config.php');
    date_default_timezone_set('Asia/Manila');
    if (isset($_POST['editappointment'])) {
        $appointmentid = $_POST['appointmentid'];
        $appointmentfullname = $_POST['fullname'];
        $appointmentemail = $_POST['email'];
        $appointmentmobilenumber = $_POST['mobilenumber'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $appointmentservice = $_POST['service'];
        $appointmentremarks = $_POST['appointmentremarks'];
        $newDateTime = date('Y-m-d H:i:s', strtotime("$date $time"));

        $sql = "UPDATE `tbl_appointment` SET `APP_NAME`='$appointmentfullname',`APP_EMAIL`='$appointmentemail',`APP_MOBILE_NUMBER`='$appointmentmobilenumber',`START_DATE`='$newDateTime',`END_DATE`='$newDateTime',`REMARKS`='$appointmentremarks', `SERVICE_ID`='$appointmentservice' WHERE APP_ID = '$appointmentid'";
        $result = mysqli_query($conn, $sql);

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
            $_SESSION['alert-text'] = "Error description: ".mysqli_error($conn);
            header("Location: ../pages/admin_appointment.php");
        }
    } else if (isset($_POST['acceptappointment'])) {
        $appointmentid = $_POST['appointmentidAccept'];
        $accepted_status = 1;

        $sql = "UPDATE tbl_appointment SET APP_STATUS = '$accepted_status' WHERE APP_ID = '$appointmentid'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Appointment accepted successfully";
            header("Location: ../pages/admin_appointment.php");
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
        $reject_status = 2;

        $sql = "UPDATE tbl_appointment SET APP_STATUS = '$reject_status' WHERE APP_ID = '$appointmentid'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Appointment rejected successfully";
            header("Location: ../pages/admin_appointment.php");
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
        $cancel_status = 3;

        $sql = "UPDATE tbl_appointment SET APP_STATUS = '$cancel_status' WHERE APP_ID = '$appointmentid'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // SUCCESS
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Appointment canceled successfully";
            header("Location: ../pages/admin_appointment.php");
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
?>