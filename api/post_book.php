<?php
    include_once('../utils/db_config.php');
    include_once('../utils/routes.php');
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
        $descriptive_datetime = date('M-d-Y h:i a', strtotime("$date $time"));

        $sql_service = "SELECT SERVICE_NAME FROM tbl_service WHERE SERVICE_ID = '$service'";
        $result_service = $conn -> query($sql_service);
        while($row = mysqli_fetch_array($result_service)){
           $service_name = $row['SERVICE_NAME'];
        }
        
        $remarks = $fullname." booked a service of ".$service_name.". \n\nDate: ".$descriptive_datetime." \nNumber: ".$mobile_number."\nEmail: ".$email;

        $sql_appointment = "INSERT tbl_appointment (APP_NAME, APP_EMAIL, APP_MOBILE_NUMBER, START_DATE, END_DATE, REMARKS, SERVICE_ID) values ('$fullname', '$email', '$mobile_number', '$newDateTime', '$newDateTime', '$remarks', '$service')";
        $result = mysqli_query($conn, $sql_appointment);

        if($result){
            header("Location: ../");
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "success";
            $_SESSION['alert-title'] = "Success";
            $_SESSION['alert-text'] = "Thank you for booking. See you";
        }else{
            header("Location: ../");
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Oops!";
            $_SESSION['alert-text'] = $newDateTime;
        }
    }
?>