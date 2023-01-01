<?php
include_once('../utils/db_config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `tbl_user` WHERE USER_USERNAME = '$username' && USER_PASSWORD = '$password'";
    $result = $conn->query($sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        session_start();

        $idaudit =  $_SESSION['user_id']; //id
        $descriptionaudit = "Logged in " . $row['USER_USERNAME'] . "id " . $row['USER_ID']; // description plus banner name
        $audit = "INSERT INTO tbl_audit (USER_ID, AUDIT_ACTIVITY) VALUES ('$idaudit', '$descriptionaudit' )";
        $query_audit = mysqli_query($conn, $audit);

        $_SESSION['user_name'] = $row['USER_USERNAME'];
        $_SESSION['user_id'] = $row['USER_ID'];
        $_SESSION['user_type'] = $row['USER_TYPE'];
        $_SESSION['fname_name'] = $row['USER_FNAME'];
        $_SESSION['lname_name'] = $row['USER_LNAME'];
        header('Location: /pages/admin_dashboard.php');
    } else {
        // ERROR
        $_SESSION['alert'] = true;
        $_SESSION['alert-icon'] = "error";
        $_SESSION['alert-title'] = "Oops!";
        $_SESSION['alert-text'] = "Invalid username and password";
        header('Location: /pages/login.php');
    }
}
