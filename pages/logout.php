<?php


include_once('../utils/db_config.php');



$idaudit =  $_SESSION['user_id']; //id
$descriptionaudit = "Logged out user id " .   $idaudit; // description plus banner name
$audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
$query_audit = mysqli_query($conn, $audit);


session_destroy();
header('Location: login.php');
exit;
