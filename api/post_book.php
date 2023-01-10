<?php
include_once('../utils/db_config.php');
include_once('../utils/routes.php');
include_once('../utils/helper.php');
date_default_timezone_set('Asia/Manila');
if (isset($_POST['book'])) {
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
    $gender = "Not yet indicated";
    $address = "Not yet indicated";
    $status = 1;
    $date_now = getDateNow();



    $sql_service = "SELECT SERVICE_NAME FROM tbl_service WHERE SERVICE_ID = '$service'";
    $result_service = $conn->query($sql_service);
    while ($row = mysqli_fetch_array($result_service)) {
        $service_name = $row['SERVICE_NAME'];
    }

    $text = $descriptive_datetime . " " . $fullname . " - " . $service_name;

    $sql_appointment = "INSERT tbl_appointment (APP_NAME, APP_EMAIL, APP_MOBILE_NUMBER, APP_APPLY_DATE, START_DATE, END_DATE, TEXT, SERVICE_ID) values ('$fullname', '$email', '$mobile_number', '$date_now', '$newDateTime', '$newDateTime', '$text', '$service')";
    $result = mysqli_query($conn, $sql_appointment);

    $validate = "SELECT * FROM  tbl_customer WHERE CUSTOMER_NAME = '$fullname' AND CUSTOMER_EMAIL = '$email' AND CUSTOMER_MOBILE_NUMBER = '$mobile_number' ";
    $query_validate = mysqli_query($conn, $validate);


    if (mysqli_num_rows($query_validate) == 0) {
        $sqls = "INSERT INTO tbl_customer (CUSTOMER_NAME, CUSTOMER_EMAIL, CUSTOMER_MOBILE_NUMBER, CUSTOMER_STATUS) VALUES ('$fullname', '$email', '$mobile_number',  '$status')";
        $results = mysqli_query($conn, $sqls);
    }


    if ($result) {
        $send_email = sendEmail($fullname, $email, $email_subject, $email_message, $mobile_number, $newDateTime, $service_name);
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
            $_SESSION['alert-title'] = "Appointment Received!";
            $_SESSION['alert-text'] = "Wait for confirmation. Thank you!";
            header("Location: ../");
        }
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Oops!";
        $_SESSION['alert-text'] = "Something went wrong";
        header("Location: ../");
    }
}
