<?php 
    include_once('../utils/db_config.php');
    date_default_timezone_set('Asia/Manila');

    $sql = "SELECT * FROM tbl_about";
    $result = $conn -> query($sql);
    $about = array();
    while($row = mysqli_fetch_array($result)){
        $temp = array();
        $temp['ABOUT_ID'] =  $row['ABOUT_ID'];
        $temp['USER_ID'] =  $row['USER_ID'];
        $temp['ABOUT_TITLE'] = $row['ABOUT_TITLE'];
        $temp['ABOUT_DESCRIPTION'] =  $row['ABOUT_DESCRIPTION'];
        $temp['ABOUT_DATETIME_CREATED'] =  $row['ABOUT_DATETIME_CREATED'];
        $temp['ABOUT_STATUS'] =  $row['ABOUT_STATUS'];
        array_push($about, $temp);
    }
    echo json_encode(array('getAbout' => $about));
?>