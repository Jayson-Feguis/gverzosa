<?php 
    include_once('../utils/db_config.php');

    $sql = "SELECT * FROM tbl_appointment";
    $result = $conn -> query($sql);
    $appointment = array();
    while($row = mysqli_fetch_array($result)){
        $temp = array();
        $temp['APP_ID'] =  $row['APP_ID'];
        $temp['APP_NAME'] =  $row['APP_NAME'];
        $temp['APP_EMAIL'] = $row['APP_EMAIL'];
        $temp['APP_MOBILE_NUMBER'] =  $row['APP_MOBILE_NUMBER'];
        $temp['APP_APPLY_DATE'] =  $row['APP_APPLY_DATE'];
        $temp['APP_APPOINTMENT_DATE'] =  $row['APP_APPOINTMENT_DATE'];
        $temp['APP_APPOINTMENT_TIME'] =  $row['APP_APPOINTMENT_TIME'];
        $temp['APP_STATUS'] =  $row['APP_STATUS'];
        $temp['APP_REMARKS'] =  $row['APP_REMARKS'];
        $temp['SERVICE_ID'] =  $row['SERVICE_ID'];
        array_push($appointment, $temp);
    }
    echo json_encode($appointment);
?>