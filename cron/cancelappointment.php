<?php
    include_once('../utils/db_config.php');
    include_once('../utils/helper.php');
    include_once('../utils/utils.php');
    date_default_timezone_set('Asia/Manila');

    $appointmentid ='';
    $appointmentfullname ='';
    $appointmentemail = '';
    $appointmentremarks = '';
    $cancel_status = 3;
    $date_now = date("Y-m-d");
    $time_now = date('H:i:s');
    $closing_time = date('H:i:s', strtotime(CLOSING_TIME));

    $app_query = "SELECT APP_ID, APP_NAME, APP_EMAIL, REMARKS, START_DATE FROM tbl_appointment WHERE APP_STATUS = 0";
    $app_result = $conn->query($app_query);
    if ($app_result) {
        while ($rows = mysqli_fetch_array($app_result)) {
            $appointmentid = $rows['APP_ID'];
            $appointmentfullname =  $rows['APP_NAME'];
            $appointmentemail =  $rows['APP_EMAIL'];
            $appointmentremarks =  $rows['REMARKS'];
            $email_subject = "G. Verzosa - Your booking is Canceled";
    $email_message = "We would like to inform you that your appointment has been CANCELED due to the reason of " . $appointmentremarks . ". Thank you for choosing our sevice and have a great day.";

            $start_date= $rows['START_DATE'];
            $date = date('Y-m-d', strtotime("$start_date"));
            $time = date('H:i:s', strtotime("$start_date"));
            if($date === $date_now){
                if($time < $time_now){
                    $sql = "UPDATE tbl_appointment SET APP_STATUS = '$cancel_status', REMARKS = '$appointmentremarks' WHERE APP_ID = '$appointmentid'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $send_email = sendEmail($appointmentfullname, $appointmentemail, $email_subject, $email_message);
                    } 
                }
            }
            else if($date < $date_now){
                $sql = "UPDATE tbl_appointment SET APP_STATUS = '$cancel_status', REMARKS = '$appointmentremarks' WHERE APP_ID = '$appointmentid'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $send_email = sendEmail($appointmentfullname, $appointmentemail, $email_subject, $email_message);
                    } 
            }
        }
    }
    

    // $sql = "UPDATE tbl_appointment SET APP_STATUS = '$cancel_status', REMARKS = '$appointmentremarks' WHERE APP_ID = '$appointmentid'";
    // $result = mysqli_query($conn, $sql);

    // if ($result) {
    //     $send_email = sendEmail($appointmentfullname, $appointmentemail, $email_subject, $email_message);
    // } 

    // $idaudit =  $_SESSION['user_id']; //id
    // $descriptionaudit = "Cancelled an appointment id " . $appointmentid; // description plus banner name
    // $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
    // $query_audit = mysqli_query($conn, $audit);

    
?>