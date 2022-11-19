<?php
    session_start();
    include_once('../utils/db_config.php');
    include_once('../utils/routes.php');
 
    if (isset($_POST['book'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $mobile_number = $_POST['mobilenumber'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $service = $_POST['service'];

        $sql = "INSERT tbl_appointment (APP_NAME, APP_EMAIL, APP_MOBILE_NUMBER, APP_APPOINTMENT_DATE, APP_APPOINTMENT_TIME, SERVICE_ID) values ('$fullname', '$email', '$mobile_number', '$date', '$time', '$service')";
        $result = mysqli_query($conn, $sql);

        header("Location: ../");
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "success";
        $_SESSION['alert-title'] = "Success";
        $_SESSION['alert-text'] = "Thank you for booking. See you";
    }
?>