<?php
include_once('../utils/db_config.php');
include_once('../utils/helper.php');
date_default_timezone_set('Asia/Manila');

if (isset($_POST['sendfeedback'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $pic = $_POST['picture'];
    $mobile_number = $_POST['mobilenumber'];
    $feedback = $_POST['feedback'];
    $email_subject = "G. Verzosa - Feedback";
    $status = 1;
    $id = 1;
    $sql = "INSERT tbl_feedback (FEEDBACK_CONTENT, FEEDBACK_STATUS, CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_PICTURE) VALUES ('$feedback ', '$status', '$id', '$fullname', '$pic')";
    $result = mysqli_query($conn, $sql);
    $send_email = sendEmailFeedback($fullname, $email, $mobile_number, $email_subject, $feedback);
    if ($send_email != 1) {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Error";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../");
    } else if ($send_email == 1) {
        // SUCCESS
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Feedback sent successfully";
        header("Location: ../");
    }
}
