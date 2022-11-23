<?php
    include_once('../utils/db_config.php');

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `tbl_user` WHERE USER_USERNAME = '$username' && USER_PASSWORD = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['user_name'] = $row['USER_USERNAME'];
            $_SESSION['user_id'] = $row['USER_ID'];
            $_SESSION['user_type'] = $row['USER_TYPE'];
            $_SESSION['fname_name'] = $row['USER_FNAME'];
            $_SESSION['lname_name'] = $row['USER_LNAME'];
            header('location: /gverzosa/pages/admin_dashboard.php');
        } else {
            // ERROR
            $_SESSION['alert'] = true;
            $_SESSION['alert-icon'] = "error";
            $_SESSION['alert-title'] = "Oops!";
            $_SESSION['alert-text'] = "Invalid username and password";
            header('location: /gverzosa/pages/login.php');
        }
    }
?>