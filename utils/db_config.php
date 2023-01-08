<?php 
    session_start();
    include_once('env_config.php');

    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

    date_default_timezone_set('Asia/Manila');
?>