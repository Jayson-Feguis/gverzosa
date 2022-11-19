<?php
    session_start();
    include_once('../utils/db_config.php');
 
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `tbl_user` WHERE USER_USERNAME = '$username' && USER_PASSWORD = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_name'] = $row['USER_USERNAME'];
            $_SESSION['user_id'] = $row['USER_ID'];
            $_SESSION['user_type'] = $row['USER_TYPE'];
            
            header('location: /gverzosa/pages/admin_home.php');
        }
        else{
            echo "notloggedin";
            echo $password;  
        }
    }
?>