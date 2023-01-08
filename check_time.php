<?php

include_once('./utils/db_config.php');
function checkAppointmentTime($selectedDate, $selectedTime, $con)
{

    $newDateTime = date('Y-m-d H:i:s', strtotime("$selectedDate $selectedTime"));
    $validate = "SELECT * FROM  tbl_appointment WHERE START_DATE = '$newDateTime'";
    $query_validate = mysqli_query($con, $validate);

    if (mysqli_num_rows($query_validate) > 0) {
        return true;
    } else {
        return false;
    }
}

// AJAX code to check if an appointment time is available
if (isset($_POST['selectedDate']) && isset($_POST['selectedTime'])) {
    $selectedDate = $_POST['selectedDate'];
    $selectedTime = $_POST['selectedTime'];
    $timeIsTaken = checkAppointmentTime($selectedDate, $selectedTime, $conn);

    if ($timeIsTaken) {
        echo "true";
    } else {
        echo "false";
    }
}
